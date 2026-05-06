# Plataforma Web de Alquiler de Objetos por Tiempo Limitado

## Descripción del proyecto
Este proyecto consiste en el desarrollo de una plataforma web de alquiler de objetos por tiempo limitado, orientada a facilitar la interacción entre personas que desean ofrecer artículos en alquiler y usuarios que buscan acceder temporalmente a ellos de forma segura, organizada y confiable.

La plataforma permitirá gestionar el ciclo completo del alquiler, desde el registro de usuarios y publicación de productos, hasta la reserva, entrega, devolución, validación del estado del objeto, gestión de depósitos de garantía, calificaciones, reclamos y administración de transacciones.

El sistema está siendo desarrollado con enfoque académico como parte de un proyecto universitario, bajo la metodología de trabajo por sprints y con el objetivo de construir un **Mínimo Producto Viable (MVP)** funcional en un plazo de 3 meses.

---

## Objetivo general
Desarrollar, en un plazo de 3 meses, una plataforma web de alquiler de objetos por tiempo limitado que permita gestionar usuarios con roles de arrendador, arrendatario y administrador, la publicación y búsqueda de productos, el control de inventario y reservas, la validación de identidad, la gestión de pagos y depósitos de garantía, el registro de evidencias, calificaciones y reclamos, con el fin de mejorar la seguridad, trazabilidad y organización del proceso de alquiler dentro de un entorno digital.

---



## Roles del sistema

### Arrendador
Usuario que publica productos o servicios de alquiler dentro de la plataforma.  
Puede:

- registrar y administrar artículos,
- definir precio, depósito, disponibilidad y condiciones,
- revisar solicitudes de alquiler,
- entregar y recibir productos,
- recibir pagos según el estado de la transacción,
- calificar al arrendatario.

### Arrendatario
Usuario que busca, selecciona y solicita productos en alquiler.  
Puede:

- explorar el catálogo,
- filtrar por precio, disponibilidad o ubicación,
- realizar reservas,
- aceptar términos y condiciones,
- pagar el alquiler y dejar depósito,
- adjuntar evidencias en la devolución,
- consultar su historial,
- calificar al arrendador,
- presentar reclamos en caso de incumplimiento.

### Administrador
Usuario encargado de supervisar y controlar la plataforma.  
Puede:

- validar información de usuarios,
- revisar documentación de identidad,
- gestionar quejas y reclamos,
- consultar el historial de transacciones,
- monitorear movimientos internos del sistema,
- apoyar la resolución de conflictos entre usuarios.

---

## Flujo general del sistema
1. El usuario se registra e inicia sesión.
2. Se valida su identidad con foto personal y documento.
3. El arrendador publica un objeto con su información.
4. El arrendatario consulta el catálogo y selecciona un producto.
5. El sistema muestra disponibilidad, ubicación y condiciones del alquiler.
6. El arrendatario acepta términos y condiciones.
7. Se registra el pago del alquiler y el depósito de garantía.
8. El sistema mantiene el depósito retenido durante el proceso.
9. Se realiza la entrega del objeto con evidencias.
10. Al finalizar el alquiler, ambas partes registran evidencias de devolución.
11. Si el objeto se devuelve en buen estado, el depósito es retornado al arrendatario.
12. Si existen daños comprobados, el depósito puede transferirse al arrendador.
13. Ambas partes pueden calificarse y presentar reclamos si es necesario.

---

## MVP del proyecto
El **Mínimo Producto Viable (MVP)** del sistema estará compuesto por los siguientes módulos principales:

- catálogo de productos,
- gestión de inventario en tiempo real,
- motor de reservas.

Este MVP será el entregable mínimo funcional listo para pruebas beta académicas controladas al finalizar los 3 meses del proyecto.

---

## Funcionalidades principales
- Registro y autenticación de usuarios
- Gestión de roles
- Validación de identidad
- Publicación de productos
- Catálogo y filtros de búsqueda
- Ubicación y distancia aproximada
- Inventario en tiempo real
- Sistema de reservas
- Aceptación de políticas
- Gestión de pagos y depósitos
- Registro de evidencias
- Historial de alquileres
- Sistema de calificaciones
- Gestión de reclamos
- Panel administrativo
- Registro de transacciones

---

## Reglas de negocio principales
- El arrendador no recibe el dinero del alquiler hasta que el proceso cumpla las condiciones definidas por la plataforma.
- El arrendatario debe entregar un depósito de garantía adicional al valor del alquiler.
- El depósito permanecerá retenido hasta la devolución del objeto.
- Si el producto se devuelve en buen estado, el depósito será retornado al arrendatario.
- Si el producto presenta daños comprobados, el depósito podrá transferirse al arrendador.
- Si el arrendador no entrega el objeto, el arrendatario podrá solicitar el reembolso total del dinero.
- Cada transacción generará una comisión interna del 3% para la plataforma.
- Todo proceso deberá contar con trazabilidad documental mediante evidencias.

---

## Estado del proyecto
Proyecto en etapa de planificación y definición de arquitectura.  
Actualmente se encuentran en proceso de:

- estructuración de requerimientos,
- definición de módulos,
- organización por sprints,
- selección de tecnologías,
- diseño del MVP.

---

## Metodología de trabajo
El proyecto será desarrollado bajo una metodología ágil, organizada en **12 sprints** distribuidos en un periodo de 3 meses.

Esto permitirá:

- dividir el desarrollo por módulos,
- validar avances progresivos,
- corregir errores de forma iterativa,
- entregar un MVP funcional al cierre del proyecto.

---

## Estructura esperada del proyecto
> Esta estructura podrá ajustarse cuando se definan las tecnologías.

```bash
project-root/
├── docs/
├── src/
├── public/
├── tests/
├── database/
├── assets/
├── README.md
└── .gitignore