<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlquilaTec — Arrienda lo que necesitas</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Poppins', sans-serif;
            color: #1a2b4a;
            overflow-x: hidden;
        }

        /* ── NAVBAR ── */
        .navbar {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 100;
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(12px);
            box-shadow: 0 2px 20px rgba(26,95,168,0.1);
        }

        .nav-logo {
            display: flex;
            align-items: center;
            gap: 0.625rem;
            text-decoration: none;
        }

        .nav-logo img {
            width: 40px; height: 40px;
            object-fit: contain;
        }

        .nav-logo-text {
            font-family: 'Nunito', sans-serif;
            font-size: 1.25rem;
            font-weight: 800;
            color: white;
            transition: color 0.3s;
        }

        .navbar.scrolled .nav-logo-text { color: #1A5FA8; }
        .nav-logo-text span { color: #F7941D; }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .nav-link {
            font-size: 0.875rem;
            font-weight: 500;
            color: rgba(255,255,255,0.9);
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all 0.2s;
        }

        .navbar.scrolled .nav-link { color: #374151; }

        .nav-link:hover {
            background: rgba(255,255,255,0.15);
            color: white;
        }

        .navbar.scrolled .nav-link:hover {
            background: #f0f6ff;
            color: #1A5FA8;
        }

        .nav-btn {
            font-size: 0.875rem;
            font-weight: 600;
            color: #1A5FA8;
            background: white;
            text-decoration: none;
            padding: 0.5rem 1.25rem;
            border-radius: 10px;
            transition: all 0.2s;
            font-family: 'Nunito', sans-serif;
        }

        .nav-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(255,255,255,0.3);
        }

        .navbar.scrolled .nav-btn {
            background: linear-gradient(135deg, #29ABE2, #1A5FA8);
            color: white;
        }

        /* ── HERO ── */
        .hero {
            min-height: 100vh;
            background: linear-gradient(145deg, #1A5FA8 0%, #29ABE2 55%, #0ea5e9 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            padding: 6rem 2rem 4rem;
        }

        .hero-bubble {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
        }

        .hero-bubble.b1 {
            width: 600px; height: 600px;
            background: rgba(255,255,255,0.05);
            top: -200px; right: -150px;
        }

        .hero-bubble.b2 {
            width: 400px; height: 400px;
            background: rgba(247,148,29,0.08);
            bottom: -100px; left: -100px;
        }

        .hero-bubble.b3 {
            width: 200px; height: 200px;
            background: rgba(255,255,255,0.06);
            top: 30%; left: 10%;
        }

        .hero-content {
            position: relative;
            z-index: 1;
            text-align: center;
            max-width: 760px;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(255,255,255,0.15);
            border: 1px solid rgba(255,255,255,0.25);
            border-radius: 50px;
            padding: 0.4rem 1rem;
            font-size: 0.8rem;
            color: white;
            font-weight: 500;
            margin-bottom: 1.5rem;
            animation: fadeUp 0.6s ease both 0.2s;
        }

        .hero-badge-dot {
            width: 8px; height: 8px;
            background: #F7941D;
            border-radius: 50%;
            animation: blink 1.5s ease-in-out infinite;
        }

        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.3; }
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to   { opacity: 1; }
        }

        .hero-title {
            font-family: 'Nunito', sans-serif;
            font-size: clamp(2.5rem, 6vw, 4rem);
            font-weight: 900;
            color: white;
            line-height: 1.1;
            margin-bottom: 1.25rem;
            animation: fadeUp 0.6s ease both 0.3s;
        }

        .hero-title span { color: #F7941D; }

        .hero-desc {
            font-size: clamp(1rem, 2vw, 1.125rem);
            color: rgba(255,255,255,0.85);
            line-height: 1.7;
            margin-bottom: 2.5rem;
            max-width: 560px;
            margin-left: auto;
            margin-right: auto;
            animation: fadeUp 0.6s ease both 0.4s;
        }

        .hero-actions {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
            animation: fadeUp 0.6s ease both 0.5s;
        }

        .btn-primary {
            padding: 0.875rem 2rem;
            background: #F7941D;
            color: white;
            border-radius: 14px;
            font-size: 1rem;
            font-weight: 700;
            font-family: 'Nunito', sans-serif;
            text-decoration: none;
            transition: all 0.25s;
            border: none;
            cursor: pointer;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(247,148,29,0.45);
            background: #e07b0a;
        }

        .btn-secondary {
            padding: 0.875rem 2rem;
            background: rgba(255,255,255,0.15);
            color: white;
            border-radius: 14px;
            font-size: 1rem;
            font-weight: 600;
            font-family: 'Nunito', sans-serif;
            text-decoration: none;
            border: 1.5px solid rgba(255,255,255,0.35);
            transition: all 0.25s;
        }

        .btn-secondary:hover {
            background: rgba(255,255,255,0.25);
            transform: translateY(-2px);
        }

        /* Stats flotantes */
        .hero-stats {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-top: 3.5rem;
            flex-wrap: wrap;
            animation: fadeUp 0.6s ease both 0.6s;
        }

        .hero-stat {
            text-align: center;
            color: white;
        }

        .hero-stat-num {
            font-family: 'Nunito', sans-serif;
            font-size: 1.75rem;
            font-weight: 900;
            color: #F7941D;
        }

        .hero-stat-label {
            font-size: 0.75rem;
            opacity: 0.8;
            margin-top: 0.2rem;
        }

        .hero-stat-divider {
            width: 1px;
            background: rgba(255,255,255,0.2);
            align-self: stretch;
        }

        /* ── CATEGORÍAS ── */
        .section {
            padding: 5rem 2rem;
        }

        .section-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-tag {
            display: inline-block;
            background: rgba(41,171,226,0.1);
            color: #1A5FA8;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            padding: 0.35rem 1rem;
            border-radius: 50px;
            margin-bottom: 0.875rem;
        }

        .section-title {
            font-family: 'Nunito', sans-serif;
            font-size: clamp(1.75rem, 4vw, 2.5rem);
            font-weight: 900;
            color: #1a2b4a;
            line-height: 1.2;
            margin-bottom: 0.75rem;
        }

        .section-title span { color: #29ABE2; }

        .section-desc {
            font-size: 1rem;
            color: #7a8fa6;
            max-width: 500px;
            margin: 0 auto;
            line-height: 1.65;
        }

        /* Grid categorías */
        .categories-bg {
            background: #f0f6ff;
        }

        .categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1.25rem;
            max-width: 1100px;
            margin: 0 auto;
        }

        .cat-card {
            background: white;
            border-radius: 20px;
            padding: 2rem 1.5rem;
            text-align: center;
            border: 1.5px solid #e8f0fb;
            transition: all 0.3s ease;
            cursor: pointer;
            text-decoration: none;
            display: block;
        }

        .cat-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 50px rgba(26,95,168,0.12);
            border-color: #29ABE2;
        }

        .cat-icon {
            width: 70px; height: 70px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin: 0 auto 1rem;
        }

        .cat-icon.blue   { background: rgba(41,171,226,0.1); }
        .cat-icon.orange { background: rgba(247,148,29,0.1); }
        .cat-icon.green  { background: rgba(16,185,129,0.1); }
        .cat-icon.purple { background: rgba(139,92,246,0.1); }

        .cat-name {
            font-family: 'Nunito', sans-serif;
            font-size: 1.1rem;
            font-weight: 800;
            color: #1a2b4a;
            margin-bottom: 0.4rem;
        }

        .cat-count {
            font-size: 0.8rem;
            color: #9CA3AF;
        }

        /* ── CÓMO FUNCIONA ── */
        .steps-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 2rem;
            max-width: 1000px;
            margin: 0 auto;
            position: relative;
        }

        .step-card {
            text-align: center;
            position: relative;
        }

        .step-num {
            width: 56px; height: 56px;
            border-radius: 16px;
            background: linear-gradient(135deg, #29ABE2, #1A5FA8);
            color: white;
            font-family: 'Nunito', sans-serif;
            font-size: 1.25rem;
            font-weight: 900;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.25rem;
            box-shadow: 0 8px 20px rgba(41,171,226,0.3);
        }

        .step-title {
            font-family: 'Nunito', sans-serif;
            font-size: 1.1rem;
            font-weight: 800;
            color: #1a2b4a;
            margin-bottom: 0.5rem;
        }

        .step-desc {
            font-size: 0.875rem;
            color: #7a8fa6;
            line-height: 1.6;
        }

        /* ── BENEFICIOS ── */
        .benefits-bg {
            background: linear-gradient(145deg, #1A5FA8 0%, #29ABE2 100%);
        }

        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.5rem;
            max-width: 1100px;
            margin: 0 auto;
        }

        .benefit-card {
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 20px;
            padding: 1.75rem;
            transition: all 0.3s;
        }

        .benefit-card:hover {
            background: rgba(255,255,255,0.18);
            transform: translateY(-4px);
        }

        .benefit-icon {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .benefit-title {
            font-family: 'Nunito', sans-serif;
            font-size: 1.1rem;
            font-weight: 800;
            color: white;
            margin-bottom: 0.5rem;
        }

        .benefit-desc {
            font-size: 0.875rem;
            color: rgba(255,255,255,0.8);
            line-height: 1.6;
        }

        /* ── CTA FINAL ── */
        .cta-section {
            background: #f0f6ff;
            padding: 5rem 2rem;
            text-align: center;
        }

        .cta-card {
            background: white;
            border-radius: 28px;
            padding: 3.5rem 2rem;
            max-width: 700px;
            margin: 0 auto;
            border: 1.5px solid #e8f0fb;
            box-shadow: 0 20px 60px rgba(26,95,168,0.08);
        }

        .cta-title {
            font-family: 'Nunito', sans-serif;
            font-size: clamp(1.75rem, 4vw, 2.5rem);
            font-weight: 900;
            color: #1a2b4a;
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .cta-title span { color: #F7941D; }

        .cta-desc {
            font-size: 1rem;
            color: #7a8fa6;
            margin-bottom: 2rem;
            line-height: 1.65;
        }

        .cta-actions {
            display: flex;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .cta-btn-main {
            padding: 0.875rem 2.5rem;
            background: linear-gradient(135deg, #29ABE2, #1A5FA8);
            color: white;
            border-radius: 14px;
            font-size: 1rem;
            font-weight: 700;
            font-family: 'Nunito', sans-serif;
            text-decoration: none;
            transition: all 0.25s;
        }

        .cta-btn-main:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(26,95,168,0.3);
        }

        .cta-btn-sec {
            padding: 0.875rem 2rem;
            background: transparent;
            color: #1A5FA8;
            border-radius: 14px;
            font-size: 1rem;
            font-weight: 600;
            font-family: 'Nunito', sans-serif;
            text-decoration: none;
            border: 1.5px solid #1A5FA8;
            transition: all 0.25s;
        }

        .cta-btn-sec:hover {
            background: #f0f6ff;
            transform: translateY(-2px);
        }

        /* ── FOOTER ── */
        .footer {
            background: #1a2b4a;
            padding: 2rem;
            text-align: center;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.625rem;
            margin-bottom: 0.75rem;
        }

        .footer-logo img {
            width: 32px; height: 32px;
            object-fit: contain;
        }

        .footer-logo-text {
            font-family: 'Nunito', sans-serif;
            font-size: 1.125rem;
            font-weight: 800;
            color: white;
        }

        .footer-logo-text span { color: #F7941D; }

        .footer-copy {
            font-size: 0.8rem;
            color: rgba(255,255,255,0.4);
        }

        /* Responsive */
        @media (max-width: 640px) {
            .navbar { padding: 1rem; }
            .hero-stat-divider { display: none; }
            .nav-link { display: none; }
        }
    </style>
</head>
<body>

    {{-- ── NAVBAR ── --}}
    <nav class="navbar" id="navbar">
        <a href="/" class="nav-logo">
            <img src="{{ asset('images/logo.png') }}" alt="AlquilaTec">
            <span class="nav-logo-text">Alquila<span>Tec</span></span>
        </a>
        <div class="nav-links">
            <a href="#categorias" class="nav-link">Categorías</a>
            <a href="#como-funciona" class="nav-link">Cómo funciona</a>
            <a href="{{ route('login') }}" class="nav-link">Iniciar sesión</a>
            <a href="{{ route('register') }}" class="nav-btn">Registrarse</a>
        </div>
    </nav>

    {{-- ── HERO ── --}}
    <section class="hero">
        <div class="hero-bubble b1"></div>
        <div class="hero-bubble b2"></div>
        <div class="hero-bubble b3"></div>

        <div class="hero-content">
            <div class="hero-badge">
                <div class="hero-badge-dot"></div>
                Plataforma de arriendo #1 en Colombia
            </div>

            <h1 class="hero-title">
                Arrienda lo que necesitas,<br>
                <span>cuando lo necesitas</span>
            </h1>

            <p class="hero-desc">
                Motos, consolas, maletas, equipos de cómputo y mucho más.
                Conectamos personas de forma simple, segura y rápida.
            </p>

            <div class="hero-actions">
                <a href="{{ route('register') }}" class="btn-primary">
                    Empieza gratis →
                </a>
                <a href="#como-funciona" class="btn-secondary">
                    ¿Cómo funciona?
                </a>
            </div>

            <div class="hero-stats">
                <div class="hero-stat">
                    <div class="hero-stat-num">500+</div>
                    <div class="hero-stat-label">Productos</div>
                </div>
                <div class="hero-stat-divider"></div>
                <div class="hero-stat">
                    <div class="hero-stat-num">200+</div>
                    <div class="hero-stat-label">Usuarios activos</div>
                </div>
                <div class="hero-stat-divider"></div>
                <div class="hero-stat">
                    <div class="hero-stat-num">98%</div>
                    <div class="hero-stat-label">Satisfacción</div>
                </div>
                <div class="hero-stat-divider"></div>
                <div class="hero-stat">
                    <div class="hero-stat-num">4.9★</div>
                    <div class="hero-stat-label">Calificación</div>
                </div>
            </div>
        </div>
    </section>

    {{-- ── CATEGORÍAS ── --}}
    <section class="section categories-bg" id="categorias">
        <div class="section-header">
            <span class="section-tag">Categorías</span>
            <h2 class="section-title">¿Qué quieres <span>arrendar hoy</span>?</h2>
            <p class="section-desc">Encuentra productos de todo tipo publicados por personas cerca de ti.</p>
        </div>

        <div class="categories-grid">
            <a href="{{ route('register') }}" class="cat-card">
                <div class="cat-icon blue">🏍️</div>
                <div class="cat-name">Motos y vehículos</div>
                <div class="cat-count">Desde $50.000/día</div>
            </a>
            <a href="{{ route('register') }}" class="cat-card">
                <div class="cat-icon orange">🎮</div>
                <div class="cat-name">Consolas y videojuegos</div>
                <div class="cat-count">Desde $20.000/día</div>
            </a>
            <a href="{{ route('register') }}" class="cat-card">
                <div class="cat-icon green">🧳</div>
                <div class="cat-name">Maletas y equipaje</div>
                <div class="cat-count">Desde $15.000/día</div>
            </a>
            <a href="{{ route('register') }}" class="cat-card">
                <div class="cat-icon purple">🖥️</div>
                <div class="cat-name">Equipos de cómputo</div>
                <div class="cat-count">Desde $30.000/día</div>
            </a>
        </div>
    </section>

    {{-- ── CÓMO FUNCIONA ── --}}
    <section class="section" id="como-funciona">
        <div class="section-header">
            <span class="section-tag">Proceso</span>
            <h2 class="section-title">Arrienda en <span>3 pasos</span></h2>
            <p class="section-desc">Simple, rápido y seguro. En minutos puedes tener lo que necesitas.</p>
        </div>

        <div class="steps-grid">
            <div class="step-card">
                <div class="step-num">1</div>
                <div class="step-title">Crea tu cuenta</div>
                <p class="step-desc">Regístrate gratis en menos de 2 minutos. Solo necesitas tu correo y documento.</p>
            </div>
            <div class="step-card">
                <div class="step-num">2</div>
                <div class="step-title">Encuentra lo que necesitas</div>
                <p class="step-desc">Explora cientos de productos disponibles cerca de ti y elige el que más te convenga.</p>
            </div>
            <div class="step-card">
                <div class="step-num">3</div>
                <div class="step-title">Arrienda y disfruta</div>
                <p class="step-desc">Coordina con el arrendador, acuerda los detalles y disfruta del producto.</p>
            </div>
        </div>
    </section>

    {{-- ── BENEFICIOS ── --}}
    <section class="section benefits-bg">
        <div class="section-header">
            <span class="section-tag" style="background:rgba(255,255,255,0.15);color:white;">¿Por qué elegirnos?</span>
            <h2 class="section-title" style="color:white;">Todo lo que necesitas <span style="color:#F7941D;">en un solo lugar</span></h2>
            <p class="section-desc" style="color:rgba(255,255,255,0.75);">Diseñado para que arrendar sea una experiencia fácil y confiable.</p>
        </div>

        <div class="benefits-grid">
            <div class="benefit-card">
                <div class="benefit-icon">🔒</div>
                <div class="benefit-title">100% Seguro</div>
                <p class="benefit-desc">Verificamos la identidad de todos los usuarios para que puedas arrendar con total confianza.</p>
            </div>
            <div class="benefit-card">
                <div class="benefit-icon">⚡</div>
                <div class="benefit-title">Rápido y fácil</div>
                <p class="benefit-desc">Publica o arrienda en minutos. Sin complicaciones, sin papeleo innecesario.</p>
            </div>
            <div class="benefit-card">
                <div class="benefit-icon">💰</div>
                <div class="benefit-title">Ahorra dinero</div>
                <p class="benefit-desc">¿Para qué comprar si puedes arrendar? Usa lo que necesitas y paga solo por el tiempo que lo uses.</p>
            </div>
            <div class="benefit-card">
                <div class="benefit-icon">🤝</div>
                <div class="benefit-title">Comunidad confiable</div>
                <p class="benefit-desc">Calificaciones y reseñas reales de usuarios que ya han usado la plataforma.</p>
            </div>
        </div>
    </section>

    {{-- ── CTA FINAL ── --}}
    <section class="cta-section">
        <div class="cta-card">
            <h2 class="cta-title">¿Listo para <span>empezar</span>?</h2>
            <p class="cta-desc">
                Únete a cientos de personas que ya están ahorrando dinero<br>
                y generando ingresos con AlquilaTec.
            </p>
            <div class="cta-actions">
                <a href="{{ route('register') }}" class="cta-btn-main">Crear cuenta gratis</a>
                <a href="{{ route('login') }}" class="cta-btn-sec">Ya tengo cuenta</a>
            </div>
        </div>
    </section>

    {{-- ── FOOTER ── --}}
    <footer class="footer">
        <div class="footer-logo">
            <img src="{{ asset('images/logo.png') }}" alt="AlquilaTec">
            <span class="footer-logo-text">Alquila<span>Tec</span></span>
        </div>
        <p class="footer-copy">© {{ date('Y') }} AlquilaTec. Todos los derechos reservados.</p>
    </footer>

    <script>
        // Navbar scroll effect
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            navbar.classList.toggle('scrolled', window.scrollY > 50);
        });

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) target.scrollIntoView({ behavior: 'smooth' });
            });
        });
    </script>

</body>
</html>