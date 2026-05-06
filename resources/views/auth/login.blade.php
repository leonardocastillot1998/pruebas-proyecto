<x-guest-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Poppins:wght@300;400;500;600&display=swap');

        .login-wrapper {
            min-height: 100vh;
            display: flex;
            font-family: 'Poppins', sans-serif;
            background: #f0f6ff;
        }

        /* Panel izquierdo decorativo */
        .login-panel-left {
            display: none;
            flex: 1;
            background: linear-gradient(145deg, #1A5FA8 0%, #29ABE2 60%, #1A5FA8 100%);
            position: relative;
            overflow: hidden;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 3rem;
        }

        @media (min-width: 1024px) {
            .login-panel-left { display: flex; }
        }

        .login-panel-left::before {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background: rgba(255,255,255,0.06);
            top: -100px;
            right: -100px;
        }

        .login-panel-left::after {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: rgba(247, 148, 29, 0.15);
            bottom: -60px;
            left: -60px;
        }

        .panel-tagline {
            color: white;
            text-align: center;
            z-index: 1;
        }

        .panel-tagline h2 {
            font-family: 'Nunito', sans-serif;
            font-size: 2rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 1rem;
        }

        .panel-tagline p {
            font-size: 1rem;
            font-weight: 300;
            opacity: 0.85;
            max-width: 300px;
            line-height: 1.7;
        }

        .panel-features {
            margin-top: 2.5rem;
            display: flex;
            flex-direction: column;
            gap: 1rem;
            z-index: 1;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: white;
        }

        .feature-icon {
            width: 36px;
            height: 36px;
            background: rgba(247, 148, 29, 0.25);
            border: 1px solid rgba(247, 148, 29, 0.4);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            flex-shrink: 0;
        }

        .feature-text {
            font-size: 0.875rem;
            opacity: 0.9;
        }

        /* Panel derecho - formulario */
        .login-panel-right {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.25rem 1.5rem;  
            background: #f0f6ff;
            overflow-y: auto;         
}

        @media (min-width: 1024px) {
            .login-panel-right {
                width: 480px;
                flex-shrink: 0;
                background: white;
                box-shadow: -20px 0 60px rgba(26, 95, 168, 0.08);
            }
        }

        .login-card {
            width: 100%;
            max-width: 400px;
        }

        .login-logo {
            display: flex;
            align-items: center;
            gap: 0.875rem;
            margin-bottom: 1.5rem;
        }

        .login-logo img {
            width: 52px;
            height: 52px;
            object-fit: contain;
        }

        .login-logo-text {
            font-family: 'Nunito', sans-serif;
            font-size: 1.5rem;
            font-weight: 800;
            color: #1A5FA8;
            letter-spacing: -0.5px;
        }

        .login-logo-text span {
            color: #F7941D;
        }

        .login-heading {
            margin-bottom: 0.5rem;
            font-family: 'Nunito', sans-serif;
            font-size: 1.75rem;
            font-weight: 800;
            color: #111827;
            letter-spacing: -0.5px;
        }

        .login-subheading {
            font-size: 0.875rem;
            color: #6B7280;
            margin-bottom: 1.25rem;
            font-weight: 400;
        }

        /* Campos del formulario */
        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-label {
            display: block;
            font-size: 0.8rem;
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.4rem;
            letter-spacing: 0.02em;
            text-transform: uppercase;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #9CA3AF;
            width: 18px;
            height: 18px;
        }

        .form-input {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 2.75rem;
            border: 1.5px solid #E5E7EB;
            border-radius: 12px;
            font-size: 0.9375rem;
            font-family: 'Poppins', sans-serif;
            color: #111827;
            background: #FAFAFA;
            transition: all 0.2s ease;
            outline: none;
        }

        .form-input:focus {
            border-color: #29ABE2;
            background: white;
            box-shadow: 0 0 0 4px rgba(41, 171, 226, 0.1);
        }

        .form-input::placeholder {
            color: #D1D5DB;
        }

        /* Checkbox recordar */
        .remember-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.75rem;
            margin-top: 0.25rem;
        }

        .remember-label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.875rem;
            color: #6B7280;
            cursor: pointer;
        }

        .remember-checkbox {
            width: 16px;
            height: 16px;
            accent-color: #29ABE2;
            cursor: pointer;
        }

        .forgot-link {
            font-size: 0.875rem;
            color: #29ABE2;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }

        .forgot-link:hover {
            color: #1A5FA8;
        }

        /* Botón principal */
        .btn-login {
            width: 100%;
            padding: 0.875rem;
            background: linear-gradient(135deg, #29ABE2, #1A5FA8);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 0.9375rem;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
            transition: all 0.25s ease;
            letter-spacing: 0.02em;
            position: relative;
            overflow: hidden;
        }

        .btn-login::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.15), transparent);
            opacity: 0;
            transition: opacity 0.2s;
        }

        .btn-login:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 25px rgba(26, 95, 168, 0.35);
        }

        .btn-login:hover::after {
            opacity: 1;
        }

        .btn-login:active {
            transform: translateY(0);
        }

        /* Divider */
        .divider {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin: 1.5rem 0;
            color: #D1D5DB;
            font-size: 0.8rem;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #E5E7EB;
        }

        /* Link registro */
        .register-link-row {
            text-align: center;
            font-size: 0.875rem;
            color: #6B7280;
        }

        .register-link {
            color: #F7941D;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.2s;
        }

        .register-link:hover {
            color: #d97706;
        }

        /* Error messages */
        .error-msg {
            font-size: 0.8rem;
            color: #EF4444;
            margin-top: 0.35rem;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .session-status {
            background: #ecfdf5;
            border: 1px solid #6ee7b7;
            color: #065f46;
            border-radius: 10px;
            padding: 0.75rem 1rem;
            font-size: 0.875rem;
            margin-bottom: 1.25rem;
        }

        /* Animación de entrada */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .login-card > * {
            animation: fadeUp 0.4s ease both;
        }

        .login-card > *:nth-child(1) { animation-delay: 0.05s; }
        .login-card > *:nth-child(2) { animation-delay: 0.1s; }
        .login-card > *:nth-child(3) { animation-delay: 0.15s; }
        .login-card > *:nth-child(4) { animation-delay: 0.2s; }
    </style>

    <div class="login-wrapper">

        {{-- Panel izquierdo (solo desktop) --}}
        <div class="login-panel-left">
            <div class="panel-tagline">
                <h2>Todo lo que necesitas,<br>cuando lo necesitas.</h2>
                <p>Arrienda motos, maletas, consolas, equipos y mucho más de forma fácil y segura.</p>
            </div>
            <div class="panel-features">
                <div class="feature-item">
                    <div class="feature-icon">🏍️</div>
                    <span class="feature-text">Motos y vehículos disponibles</span>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">🎮</div>
                    <span class="feature-text">Consolas y tecnología</span>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">🧳</div>
                    <span class="feature-text">Equipaje para tus viajes</span>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">🖥️</div>
                    <span class="feature-text">Equipos de cómputo</span>
                </div>
            </div>
        </div>

        {{-- Panel derecho - formulario --}}
        <div class="login-panel-right">
            <div class="login-card">

                {{-- Logo --}}
                <div class="login-logo">
                    <img src="{{ asset('images/logo.png') }}" alt="AlquilaTec Logo">
                    <span class="login-logo-text">Alquila<span>Tec</span></span>
                </div>

                {{-- Título --}}
                <h1 class="login-heading">Bienvenido de nuevo</h1>
                <p class="login-subheading">Ingresa tus datos para continuar</p>

                {{-- Estado de sesión --}}
                @if (session('status'))
                    <div class="session-status">{{ session('status') }}</div>
                @endif

                {{-- Formulario --}}
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    {{-- Correo --}}
                    <div class="form-group">
                        <label class="form-label" for="email">Correo electrónico</label>
                        <div class="input-wrapper">
                            <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                            </svg>
                            <input
                                id="email"
                                class="form-input"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="tucorreo@ejemplo.com"
                                required
                                autofocus
                                autocomplete="username"
                            />
                        </div>
                        @error('email')
                            <p class="error-msg">⚠ {{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Contraseña --}}
                    <div class="form-group">
                        <label class="form-label" for="password">Contraseña</label>
                        <div class="input-wrapper">
                            <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                            <input
                                id="password"
                                class="form-input"
                                type="password"
                                name="password"
                                placeholder="••••••••"
                                required
                                autocomplete="current-password"
                            />
                        </div>
                        @error('password')
                            <p class="error-msg">⚠ {{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Recordar / Olvidé contraseña --}}
                    <div class="remember-row">
                        <label class="remember-label">
                            <input class="remember-checkbox" type="checkbox" name="remember" id="remember_me">
                            Recordarme
                        </label>
                        @if (Route::has('password.request'))
                            <a class="forgot-link" href="{{ route('password.request') }}">
                                ¿Olvidaste tu contraseña?
                            </a>
                        @endif
                    </div>

                    {{-- Botón --}}
                    <button type="submit" class="btn-login">
                        Iniciar sesión
                    </button>

                    {{-- Registro --}}
                    <div class="divider">o</div>
                    <div class="register-link-row">
                        ¿No tienes cuenta?
                        <a href="{{ route('register') }}" class="register-link">Regístrate gratis</a>
                    </div>

                </form>
            </div>
        </div>

    </div>
</x-guest-layout>