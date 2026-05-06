<x-guest-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Poppins:wght@300;400;500;600&display=swap');

        * { box-sizing: border-box; margin: 0; padding: 0; }

        .cp-body {
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(145deg, #e8f4fd 0%, #f0f6ff 50%, #e4f0fb 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1.25rem;
            position: relative;
            overflow: hidden;
        }

        .cp-body::before {
            content: '';
            position: absolute;
            width: 500px; height: 500px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(41,171,226,0.12), transparent 70%);
            top: -180px; right: -150px;
            pointer-events: none;
        }

        .cp-body::after {
            content: '';
            position: absolute;
            width: 380px; height: 380px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(247,148,29,0.08), transparent 70%);
            bottom: -120px; left: -100px;
            pointer-events: none;
        }

        /* Tarjeta */
        .cp-card {
            width: 100%;
            max-width: 440px;
            background: white;
            border-radius: 24px;
            padding: 2.5rem 2.25rem;
            box-shadow:
                0 4px 6px rgba(26,95,168,0.04),
                0 20px 60px rgba(26,95,168,0.1);
            border: 1px solid rgba(41,171,226,0.1);
            position: relative;
            z-index: 1;
            animation: cardIn 0.5s cubic-bezier(0.22,1,0.36,1) both;
        }

        @keyframes cardIn {
            from { opacity: 0; transform: translateY(24px) scale(0.98); }
            to   { opacity: 1; transform: translateY(0) scale(1); }
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(10px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* Logo */
        .cp-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 1.75rem;
            animation: fadeUp 0.4s ease both 0.1s;
        }

        .cp-logo img {
            width: 40px; height: 40px;
            object-fit: contain;
        }

        .cp-logo-text {
            font-family: 'Nunito', sans-serif;
            font-size: 20px;
            font-weight: 800;
            color: #1A5FA8;
        }

        .cp-logo-text span { color: #F7941D; }

        /* Ícono escudo */
        .cp-icon-wrap {
            width: 80px; height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(247,148,29,0.12), rgba(247,148,29,0.06));
            border: 2px solid rgba(247,148,29,0.25);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            animation: fadeUp 0.4s ease both 0.15s;
        }

        .cp-icon-wrap svg {
            width: 40px; height: 40px;
            color: #F7941D;
        }

        /* Textos */
        .cp-title {
            font-family: 'Nunito', sans-serif;
            font-size: 22px;
            font-weight: 900;
            color: #1a2b4a;
            text-align: center;
            margin-bottom: 0.5rem;
            animation: fadeUp 0.4s ease both 0.2s;
        }

        .cp-desc {
            font-size: 13px;
            color: #7a8fa6;
            text-align: center;
            line-height: 1.65;
            margin-bottom: 1.75rem;
            animation: fadeUp 0.4s ease both 0.25s;
        }

        /* Alerta de seguridad */
        .cp-alert {
            background: linear-gradient(135deg, rgba(247,148,29,0.08), rgba(247,148,29,0.04));
            border: 1px solid rgba(247,148,29,0.25);
            border-radius: 12px;
            padding: 0.875rem 1rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: flex-start;
            gap: 0.625rem;
            animation: fadeUp 0.4s ease both 0.28s;
        }

        .cp-alert-icon {
            flex-shrink: 0;
            width: 30px; height: 30px;
            background: rgba(247,148,29,0.15);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .cp-alert-icon svg {
            width: 15px; height: 15px;
            color: #F7941D;
        }

        .cp-alert-text {
            font-size: 12px;
            color: #92400e;
            line-height: 1.5;
        }

        .cp-alert-text strong {
            font-weight: 600;
            display: block;
            margin-bottom: 2px;
            color: #78350f;
        }

        /* Divisor */
        .cp-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(41,171,226,0.2), transparent);
            margin-bottom: 1.5rem;
            animation: fadeUp 0.4s ease both 0.3s;
        }

        /* Campo */
        .cp-field {
            margin-bottom: 1.25rem;
            animation: fadeUp 0.4s ease both 0.32s;
        }

        .cp-label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 6px;
        }

        .cp-input-wrap { position: relative; }

        .cp-input-icon {
            position: absolute;
            left: 13px; top: 50%;
            transform: translateY(-50%);
            color: #b0c8de;
            pointer-events: none;
        }

        .cp-input-icon svg { width: 16px; height: 16px; }

        .cp-input {
            width: 100%;
            padding: 11px 40px 11px 40px;
            border: 1.5px solid #dce8f5;
            border-radius: 12px;
            font-size: 14px;
            font-family: 'Poppins', sans-serif;
            color: #1a2b4a;
            background: #f7fbff;
            transition: all 0.2s ease;
            outline: none;
        }

        .cp-input::placeholder { color: #b0c8de; }

        .cp-input:focus {
            border-color: #29ABE2;
            background: white;
            box-shadow: 0 0 0 3px rgba(41,171,226,0.12);
        }

        /* Toggle ojo */
        .cp-eye {
            position: absolute;
            right: 12px; top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #b0c8de;
            cursor: pointer;
            padding: 0;
            transition: color 0.2s;
        }

        .cp-eye:hover { color: #29ABE2; }
        .cp-eye svg { width: 16px; height: 16px; }

        .cp-error {
            font-size: 12px; color: #ef4444;
            margin-top: 4px;
            display: flex; align-items: center; gap: 4px;
        }

        /* Botón */
        .cp-btn {
            width: 100%;
            padding: 13px;
            background: linear-gradient(135deg, #F7941D, #e07b0a);
            border: none;
            border-radius: 12px;
            color: white;
            font-size: 15px;
            font-weight: 700;
            font-family: 'Nunito', sans-serif;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            animation: fadeUp 0.4s ease both 0.36s;
        }

        .cp-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 28px rgba(247,148,29,0.35);
        }

        .cp-btn:active { transform: translateY(0); }
        .cp-btn svg { width: 17px; height: 17px; }

        /* Volver */
        .cp-back {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            margin-top: 1.25rem;
            font-size: 13px;
            color: #7a8fa6;
            text-decoration: none;
            transition: color 0.2s;
            animation: fadeUp 0.4s ease both 0.4s;
        }

        .cp-back:hover { color: #1A5FA8; }
        .cp-back svg { width: 14px; height: 14px; }
    </style>

    <div class="cp-body">
        <div class="cp-card">

            {{-- Logo --}}
            <div class="cp-logo">
                <img src="{{ asset('images/logo.png') }}" alt="AlquilaTec">
                <div class="cp-logo-text">Alquila<span>Tec</span></div>
            </div>

            {{-- Ícono escudo --}}
            <div class="cp-icon-wrap">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
            </div>

            {{-- Título --}}
            <h1 class="cp-title">Confirma tu identidad</h1>
            <p class="cp-desc">
                Estás a punto de acceder a una zona segura.<br>
                Por tu protección, ingresa tu contraseña para continuar.
            </p>

            {{-- Alerta --}}
            <div class="cp-alert">
                <div class="cp-alert-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
                <div class="cp-alert-text">
                    <strong>Zona de seguridad</strong>
                    Esta acción requiere verificación adicional. Tu sesión seguirá activa.
                </div>
            </div>

            <div class="cp-divider"></div>

            {{-- Formulario --}}
            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div class="cp-field">
                    <label class="cp-label" for="password">Contraseña actual</label>
                    <div class="cp-input-wrap">
                        <span class="cp-input-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </span>
                        <input id="password" class="cp-input" type="password" name="password"
                            placeholder="••••••••" required autocomplete="current-password" autofocus>
                        <button type="button" class="cp-eye" onclick="togglePw()">
                            <svg id="cp-eye-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <p class="cp-error">⚠ {{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="cp-btn">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                    Confirmar y continuar
                </button>
            </form>

            <a href="{{ url()->previous() }}" class="cp-back">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Volver atrás
            </a>

        </div>
    </div>

    <script>
        function togglePw() {
            const inp = document.getElementById('password');
            const icon = document.getElementById('cp-eye-icon');
            const show = inp.type === 'password';
            inp.type = show ? 'text' : 'password';
            icon.innerHTML = show
                ? `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>`
                : `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>`;
        }
    </script>

</x-guest-layout>