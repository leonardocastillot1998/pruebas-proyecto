<x-guest-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Poppins:wght@300;400;500;600&display=swap');

        * { box-sizing: border-box; }

        .reg-body {
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            background: #f0f6ff;
            display: flex;
            align-items: stretch;
        }

        /* ── Formulario (izquierda) ── */
        .reg-form-side {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 2rem 2.5rem;
            background: white;
            position: relative;
            overflow: hidden;
        }

        .reg-form-side::before {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: rgba(41, 171, 226, 0.05);
            top: -80px;
            left: -80px;
            pointer-events: none;
        }

        .reg-form-side::after {
            content: '';
            position: absolute;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: rgba(247, 148, 29, 0.05);
            bottom: -50px;
            right: -50px;
            pointer-events: none;
        }

        .reg-inner {
            width: 100%;
            max-width: 480px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        /* Logo */
        .reg-logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 2rem;
        }

        .reg-logo img {
            width: 44px;
            height: 44px;
            object-fit: contain;
        }

        .reg-logo-text {
            font-family: 'Nunito', sans-serif;
            font-size: 1.375rem;
            font-weight: 800;
            color: #1A5FA8;
        }

        .reg-logo-text span { color: #F7941D; }

        /* Encabezado */
        .reg-heading {
            font-family: 'Nunito', sans-serif;
            font-size: 1.6rem;
            font-weight: 900;
            color: #111827;
            letter-spacing: -0.5px;
            margin-bottom: 0.25rem;
        }

        .reg-sub {
            font-size: 0.85rem;
            color: #6B7280;
            margin-bottom: 1.75rem;
        }

        /* Steps indicator */
        .steps-bar {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.75rem;
        }

        .step-dot {
            height: 4px;
            border-radius: 2px;
            background: #E5E7EB;
            flex: 1;
            transition: background 0.3s;
        }

        .step-dot.active { background: #29ABE2; }
        .step-dot.done   { background: #1A5FA8; }

        /* Grid de campos */
        .fields-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .field-full { grid-column: 1 / -1; }

        .field-group { display: flex; flex-direction: column; gap: 0.35rem; }

        .field-label {
            font-size: 0.75rem;
            font-weight: 600;
            color: #374151;
            letter-spacing: 0.04em;
            text-transform: uppercase;
        }

        .field-wrap {
            position: relative;
        }

        .field-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            width: 16px;
            height: 16px;
            color: #9CA3AF;
            pointer-events: none;
        }

        .field-input {
            width: 100%;
            padding: 0.65rem 0.875rem 0.65rem 2.5rem;
            border: 1.5px solid #E5E7EB;
            border-radius: 10px;
            font-size: 0.875rem;
            font-family: 'Poppins', sans-serif;
            color: #111827;
            background: #FAFAFA;
            outline: none;
            transition: all 0.2s;
        }

        .field-input:focus {
            border-color: #29ABE2;
            background: white;
            box-shadow: 0 0 0 3px rgba(41, 171, 226, 0.12);
        }

        .field-input::placeholder { color: #D1D5DB; }

        select.field-input {
            appearance: none;
            cursor: pointer;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%239CA3AF'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 16px;
            padding-right: 2.5rem;
        }

        .field-error {
            font-size: 0.75rem;
            color: #EF4444;
            margin-top: 0.2rem;
        }

        /* Rol cards */
        .role-cards {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.75rem;
        }

        .role-card {
            border: 2px solid #E5E7EB;
            border-radius: 12px;
            padding: 0.875rem;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.4rem;
            background: #FAFAFA;
        }

        .role-card:hover {
            border-color: #29ABE2;
            background: rgba(41, 171, 226, 0.04);
        }

        .role-card input[type="radio"] { display: none; }

        .role-card.selected {
            border-color: #1A5FA8;
            background: rgba(26, 95, 168, 0.06);
        }

        .role-emoji { font-size: 1.5rem; }

        .role-name {
            font-size: 0.8rem;
            font-weight: 600;
            color: #374151;
        }

        .role-desc {
            font-size: 0.7rem;
            color: #9CA3AF;
            text-align: center;
            line-height: 1.3;
        }

        /* Botón */
        .btn-register {
            width: 100%;
            padding: 0.8rem;
            background: linear-gradient(135deg, #F7941D, #e07b0a);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 0.9375rem;
            font-weight: 700;
            font-family: 'Nunito', sans-serif;
            cursor: pointer;
            transition: all 0.25s;
            letter-spacing: 0.02em;
            margin-top: 1.25rem;
        }

        .btn-register:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 25px rgba(247, 148, 29, 0.4);
        }

        .btn-register:active { transform: translateY(0); }

        .login-row {
            text-align: center;
            font-size: 0.8rem;
            color: #6B7280;
            margin-top: 1rem;
        }

        .login-row a {
            color: #1A5FA8;
            font-weight: 600;
            text-decoration: none;
        }

        .login-row a:hover { text-decoration: underline; }

        /* ── Panel derecho decorativo (solo desktop) ── */
        .reg-deco-side {
            display: none;
            width: 380px;
            flex-shrink: 0;
            background: linear-gradient(160deg, #1A5FA8 0%, #29ABE2 50%, #0ea5e9 100%);
            position: relative;
            overflow: hidden;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 3rem 2rem;
        }

        @media (min-width: 1024px) {
            .reg-deco-side { display: flex; }
        }

        /* Burbujas decorativas */
        .bubble {
            position: absolute;
            border-radius: 50%;
            opacity: 0.12;
        }

        .bubble-1 {
            width: 250px; height: 250px;
            background: white;
            top: -60px; right: -60px;
        }

        .bubble-2 {
            width: 180px; height: 180px;
            background: #F7941D;
            bottom: 40px; left: -40px;
        }

        .bubble-3 {
            width: 100px; height: 100px;
            background: white;
            bottom: 160px; right: 30px;
        }

        .deco-content {
            position: relative;
            z-index: 1;
            text-align: center;
            color: white;
        }

        .deco-title {
            font-family: 'Nunito', sans-serif;
            font-size: 1.75rem;
            font-weight: 900;
            line-height: 1.2;
            margin-bottom: 1rem;
        }

        .deco-title span { color: #F7941D; }

        .deco-desc {
            font-size: 0.9rem;
            opacity: 0.85;
            line-height: 1.7;
            margin-bottom: 2rem;
        }

        /* Stats */
        .deco-stats {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            width: 100%;
        }

        .stat-card {
            background: rgba(255,255,255,0.12);
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 16px;
            padding: 1rem;
            text-align: center;
            backdrop-filter: blur(4px);
        }

        .stat-number {
            font-family: 'Nunito', sans-serif;
            font-size: 1.5rem;
            font-weight: 900;
            color: #F7941D;
        }

        .stat-label {
            font-size: 0.75rem;
            opacity: 0.8;
            margin-top: 0.2rem;
        }

        /* Animación */
        @keyframes slideIn {
            from { opacity: 0; transform: translateX(-16px); }
            to   { opacity: 1; transform: translateX(0); }
        }

        .reg-inner > * {
            animation: slideIn 0.4s ease both;
        }

        .reg-inner > *:nth-child(1) { animation-delay: 0.05s; }
        .reg-inner > *:nth-child(2) { animation-delay: 0.1s; }
        .reg-inner > *:nth-child(3) { animation-delay: 0.15s; }
        .reg-inner > *:nth-child(4) { animation-delay: 0.2s; }
        .reg-inner > *:nth-child(5) { animation-delay: 0.25s; }
    </style>

    <div class="reg-body">

        {{-- ── Formulario (izquierda) ── --}}
        <div class="reg-form-side">
            <div class="reg-inner">

                {{-- Logo --}}
                <div class="reg-logo">
                    <img src="{{ asset('images/logo.png') }}" alt="AlquilaTec">
                    <span class="reg-logo-text">Alquila<span>Tec</span></span>
                </div>

                {{-- Encabezado --}}
                <h1 class="reg-heading">Crea tu cuenta gratis</h1>
                <p class="reg-sub">Únete y empieza a arrendar hoy mismo</p>

                {{-- Barra de progreso visual --}}
                <div class="steps-bar">
                    <div class="step-dot done"></div>
                    <div class="step-dot active"></div>
                    <div class="step-dot"></div>
                </div>

                {{-- Formulario --}}
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="fields-grid">

                        {{-- Nombre --}}
                        <div class="field-group field-full">
                            <label class="field-label" for="name">Nombre completo</label>
                            <div class="field-wrap">
                                <svg class="field-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                <input id="name" class="field-input" type="text" name="name"
                                    value="{{ old('name') }}" placeholder="Tu nombre completo" required autofocus/>
                            </div>
                            @error('name')<p class="field-error">⚠ {{ $message }}</p>@enderror
                        </div>

                        {{-- Correo --}}
                        <div class="field-group field-full">
                            <label class="field-label" for="email">Correo electrónico</label>
                            <div class="field-wrap">
                                <svg class="field-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                <input id="email" class="field-input" type="email" name="email"
                                    value="{{ old('email') }}" placeholder="correo@ejemplo.com" required/>
                            </div>
                            @error('email')<p class="field-error">⚠ {{ $message }}</p>@enderror
                        </div>

                        {{-- Documento --}}
                        <div class="field-group">
                            <label class="field-label" for="document">Documento</label>
                            <div class="field-wrap">
                                <svg class="field-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0"/>
                                </svg>
                                <input id="document" class="field-input" type="text" name="document"
                                    value="{{ old('document') }}" placeholder="Nro. documento" required/>
                            </div>
                            @error('document')<p class="field-error">⚠ {{ $message }}</p>@enderror
                        </div>

                        {{-- Teléfono --}}
                        <div class="field-group">
                            <label class="field-label" for="phone">Teléfono</label>
                            <div class="field-wrap">
                                <svg class="field-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                                <input id="phone" class="field-input" type="text" name="phone"
                                    value="{{ old('phone') }}" placeholder="Ej: 3001234567" required/>
                            </div>
                            @error('phone')<p class="field-error">⚠ {{ $message }}</p>@enderror
                        </div>

                        {{-- Contraseña --}}
                        <div class="field-group">
                            <label class="field-label" for="password">Contraseña</label>
                            <div class="field-wrap">
                                <svg class="field-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                                <input id="password" class="field-input" type="password" name="password"
                                    placeholder="••••••••" required autocomplete="new-password"/>
                            </div>
                            @error('password')<p class="field-error">⚠ {{ $message }}</p>@enderror
                        </div>

                        {{-- Confirmar contraseña --}}
                        <div class="field-group">
                            <label class="field-label" for="password_confirmation">Confirmar</label>
                            <div class="field-wrap">
                                <svg class="field-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                                <input id="password_confirmation" class="field-input" type="password"
                                    name="password_confirmation" placeholder="••••••••" required autocomplete="new-password"/>
                            </div>
                            @error('password_confirmation')<p class="field-error">⚠ {{ $message }}</p>@enderror
                        </div>

                        {{-- Tipo de usuario --}}
                        <div class="field-group field-full">
                            <label class="field-label">Tipo de cuenta</label>
                            <div class="role-cards" id="roleCards">
                                <label class="role-card {{ old('role') == 'arrendatario' || !old('role') ? 'selected' : '' }}" onclick="selectRole(this, 'arrendatario')">
                                    <input type="radio" name="role" value="arrendatario" {{ old('role', 'arrendatario') == 'arrendatario' ? 'checked' : '' }}>
                                    <span class="role-emoji">🛒</span>
                                    <span class="role-name">Arrendatario</span>
                                    <span class="role-desc">Quiero arrendar productos</span>
                                </label>
                                <label class="role-card {{ old('role') == 'arrendador' ? 'selected' : '' }}" onclick="selectRole(this, 'arrendador')">
                                    <input type="radio" name="role" value="arrendador" {{ old('role') == 'arrendador' ? 'checked' : '' }}>
                                    <span class="role-emoji">🏠</span>
                                    <span class="role-name">Arrendador</span>
                                    <span class="role-desc">Quiero publicar mis productos</span>
                                </label>
                            </div>
                            @error('role')<p class="field-error">⚠ {{ $message }}</p>@enderror
                        </div>

                    </div>

                    {{-- Botón --}}
                    <button type="submit" class="btn-register">
                        Crear mi cuenta →
                    </button>

                    <p class="login-row">
                        ¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión</a>
                    </p>

                </form>
            </div>
        </div>

        {{-- ── Panel decorativo derecho (solo desktop) ── --}}
        <div class="reg-deco-side">
            <div class="bubble bubble-1"></div>
            <div class="bubble bubble-2"></div>
            <div class="bubble bubble-3"></div>

            <div class="deco-content">
                <div class="deco-title">
                    Arrienda lo que<br>necesitas con <span>confianza</span>
                </div>
                <p class="deco-desc">
                    Conectamos personas que tienen<br>
                    con personas que necesitan.<br>
                    Simple, seguro y rápido.
                </p>

                <div class="deco-stats">
                    <div class="stat-card">
                        <div class="stat-number">500+</div>
                        <div class="stat-label">Productos disponibles</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">200+</div>
                        <div class="stat-label">Usuarios activos</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">98%</div>
                        <div class="stat-label">Satisfacción</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">4.9★</div>
                        <div class="stat-label">Calificación</div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        function selectRole(el, role) {
            document.querySelectorAll('.role-card').forEach(c => c.classList.remove('selected'));
            el.classList.add('selected');
            el.querySelector('input[type="radio"]').checked = true;
        }
    </script>

</x-guest-layout>