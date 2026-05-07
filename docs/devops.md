# Docker, CI y CD

## Docker local

1. Crea el archivo de entorno local:

```bash
cp .env.docker.example .env.docker
```

2. Genera una clave de aplicacion y pegala en `APP_KEY` dentro de `.env.docker`:

```bash
php artisan key:generate --show
```

3. Levanta la aplicacion y MySQL:

```bash
docker compose --env-file .env.docker up --build -d
```

4. Ejecuta las migraciones:

```bash
docker compose --env-file .env.docker exec app php artisan migrate --force
```

5. La aplicacion quedara disponible en `http://localhost:8000` y el health check de Laravel en `http://localhost:8000/up`.

## Estructura agregada

- `Dockerfile`: imagen de Laravel 11 con Apache y assets Vite compilados.
- `compose.yaml`: stack local con `app`, `queue` y `db`.
- `deploy/compose.production.yaml`: stack de despliegue para servidor.
- `.github/workflows/ci.yml`: validacion automatica.
- `.github/workflows/cd.yml`: publicacion de imagen y despliegue continuo.

## CI

El workflow de CI se ejecuta en `push` y `pull_request`. Hace lo siguiente:

- valida `composer.json`
- instala dependencias PHP y Node.js
- compila assets
- ejecuta migraciones en SQLite
- corre `php artisan test`

## CD

El workflow de CD se ejecuta despues de un CI exitoso sobre `master` o `main`. Hace lo siguiente:

- construye la imagen Docker
- publica la imagen en `ghcr.io`
- copia `deploy/compose.production.yaml` al servidor
- actualiza los contenedores por SSH
- corre migraciones
- deja cacheadas `config` y `views`
- opcionalmente ejecuta un smoke test contra `/up`

## Secrets requeridos en GitHub

- `DEPLOY_HOST`: host o IP del servidor.
- `DEPLOY_USER`: usuario SSH del servidor.
- `DEPLOY_PORT`: puerto SSH. Si no lo defines, usa `22`.
- `DEPLOY_PATH`: ruta remota donde vivira el stack, por ejemplo `/opt/alquilatec`.
- `DEPLOY_SSH_KEY`: clave privada con acceso al servidor.
- `GHCR_USERNAME`: usuario con permisos de lectura sobre GHCR.
- `GHCR_PAT`: token con permiso para leer paquetes en GHCR desde el servidor.
- `DEPLOY_HEALTHCHECK_URL`: opcional. Ejemplo `https://tu-dominio.com/up`.

## Preparacion del servidor

1. Instala Docker y el plugin `docker compose`.
2. Crea la carpeta de despliegue, por ejemplo `/opt/alquilatec`.
3. Dentro de esa carpeta, crea `.env.production` a partir de `deploy/.env.production.example`.
4. Genera una clave y pegala en `APP_KEY`:

```bash
php artisan key:generate --show
```

5. Ajusta `APP_URL`, credenciales de MySQL y el puerto publicado.

## Notas operativas

- Este despliegue asume un servidor Linux con Docker accesible por SSH.
- `route:cache` no se ejecuta porque el proyecto aun usa una ruta por closure en `routes/web.php`.
- Si usas un proxy inverso como Nginx o Traefik, normalmente querras exponer `APP_PORT=8080` y publicar SSL en el proxy.
