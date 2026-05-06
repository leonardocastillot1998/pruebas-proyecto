<x-guest-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Poppins:wght@300;400;500;600&display=swap');

        * { box-sizing: border-box; margin: 0; padding: 0; }

        .fp-body {
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #1A5FA8 0%, #29ABE2 50%, #0ea5e9 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            position: relative;
            overflow: hidden;
        }

        /* Círculos decorativos de fondo */
        .fp-body::before {
            content: '';
            position: absolute;
            width: 600px;
            height: 600px;
            border-radius: 50%;
            background: rgba(255,255,255,0.05);
            top: -200px;
            right: -150px;
        }

        .fp-body::after {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: rgba(247, 148, 29, 0.08);
            bottom: -150px;
            left: -100px;
        }

        /* Tarjeta central */
        .fp-card {
            background: white;
            border-radius: 24px;
            padding: 2.5rem 2rem;
            width: 100%;
            max-width: 440px;
            position: relative;
            z-index: 1;
            box-shadow: 0 30px 80px rgba(0,0,0,0.2);
        }

        /* Icono central */
        .fp-icon-wrap {
            width: 72px;
            height: 72px;
            background: linear-gradient(135deg, rgba(41,171,226,0.15), rgba(26,95,168,0.1));
            border: 2px solid rgba(41,171,226,0.2);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
        }

        .fp-icon-wrap svg {
            width: 36px;
            height: 36px;
            color: #1A5FA8;
        }

        /* Logo */
        .fp-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.625rem;
            margin-bottom: 2rem;
        }

        .fp-logo img {
            width: 36px;
            height: 36px;
            object-fit: contain;
        }

        .fp-logo-text {
            font-family: 'Nunito', sans-serif;
            font-size: 1.125rem;
            font-weight: 800;
            color: #1A5FA8;
        }

        .fp-logo-text span { color: #F7941D; }

        /* Textos */
        .fp-heading {
            font-family: 'Nunito', sans-serif;
            font-size: 1.5rem;
            font-weight: 900;
            color: #111827;
            text-align: center;
            margin-bottom: 0.5rem;
            letter-spacing: -0.3px;
        }

        .fp-desc {
            font-size: 0.85rem;
            color: #6B7280;
            text-align: center;
            line-height: 1.6;
            margin-bottom: 2rem;
        }

        /* Status */
        .fp-status {
            background: #ecfdf5;
            border: 1px solid #6ee7b7;
            color: #065f46;
            border-radius: 12px;
            padding: 0.875rem 1rem;
            font-size: 0.85rem;
            margin-bottom: 1.5rem;
            text-align: center;
            line-height: 1.5;
        }

        /* Campo */
        .fp-field { margin-bottom: 1.25rem; }

        .fp-label {
            display: block;
            font-size: 0.75rem;
            font-weight: 600;
            color: #374151;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            margin-bottom: 0.4rem;
        }

        .fp-input-wrap { position: relative; }

        .fp-input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            width: 18px;
            height: 18px;
            color: #9CA3AF;
        }

        .fp-input {
            width: 100%;
            padding: 0.8rem 1rem 0.8rem 2.75rem;
            border: 1.5px solid #E5E7EB;
            border-radius: 12px;
            font-size: 0.9rem;
            font-family: 'Poppins', sans-serif;
            color: #111827;
            background: #FAFAFA;
            outline: none;
            transition: all 0.2s;
        }

        .fp-input:focus {
            border-color: #29ABE2;
            background: white;
            box-shadow: 0 0 0 4px rgba(41,171,226,0.1);
        }

        .fp-input::placeholder { color: #D1D5DB; }

        .fp-error {
            font-size: 0.75rem;
            color: #EF4444;
            margin-top: 0.3rem;
        }

        /* Botón */
        .fp-btn {
            width: 100%;
            padding: 0.875rem;
            background: linear-gradient(135deg, #29ABE2, #1A5FA8);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 0.9375rem;
            font-weight: 700;
            font-family: 'Nunito', sans-serif;
            cursor: pointer;
            transition: all 0.25s;
            letter-spacing: 0.02em;
            margin-top: 0.5rem;
        }

        .fp-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 25px rgba(26,95,168,0.4);
        }

        .fp-btn:active { transform: translateY(0); }

        /* Volver */
        .fp-back {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.4rem;
            margin-top: 1.25rem;
            font-size: 0.85rem;
            color: #6B7280;
            text-decoration: none;
            transition: color 0.2s;
        }

        .fp-back:hover { color: #1A5FA8; }

        .fp-back svg {
            width: 16px;
            height: 16px;
        }

        /* Tip info */
        .fp-tip {
            background: #f0f9ff;
            border: 1px solid #bae6fd;
            border-radius: 12px;
            padding: 0.875rem 1rem;
            font-size: 0.8rem;
            color: #0369a1;
            line-height: 1.5;
            margin-bottom: 1.5rem;
            display: flex;
            gap: 0.5rem;
            align-items: flex-start;
        }

        .fp-tip-icon { flex-shrink: 0; font-size: 1rem; }

        /* Animación */
        @keyframes fadeScale {
            from { opacity: 0; transform: scale(0.95) translateY(10px); }
            to   { opacity: 1; transform: scale(1) translateY(0); }
        }

        .fp-card {
            animation: fadeScale 0.4s ease both;
        }
    </style>

    <div class="fp-body">
        <div class="fp-card">

            {{-- Logo --}}
            <div class="fp-logo">
                <img src="{{ asset('images/logo.png') }}" alt="AlquilaTec">
                <span class="fp-logo-text">Alquila<span>Tec</span></span>
            </div>

            {{-- Icono --}}
            <div class="fp-icon-wrap">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                </svg>
            </div>

            {{-- Título --}}
            <h1 class="fp-heading">¿Olvidaste tu contraseña?</h1>
            <p class="fp-desc">
                Sin problema. Escribe tu correo y te enviaremos<br>un enlace para restablecerla.
            </p>

            {{-- Status --}}
            @if (session('status'))
                <div class="fp-status">
                    ✅ {{ session('status') }}
                </div>
            @endif

            {{-- Tip --}}
            <div class="fp-tip">
                <span class="fp-tip-icon">💡</span>
                <span>Revisa también tu carpeta de spam si no recibes el correo en unos minutos.</span>
            </div>

            {{-- Formulario --}}
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="fp-field">
                    <label class="fp-label" for="email">Correo electrónico</label>
                    <div class="fp-input-wrap">
                        <svg class="fp-input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <input
                            id="email"
                            class="fp-input"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="tucorreo@ejemplo.com"
                            required
                            autofocus
                        />
                    </div>
                    @error('email')
                        <p class="fp-error">⚠ {{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="fp-btn">
                    Enviar enlace de recuperación
                </button>
            </form>

            {{-- Volver --}}
            <a href="{{ route('login') }}" class="fp-back">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Volver al inicio de sesión
            </a>

        </div>
    </div>

</x-guest-layout>