<x-guest-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Poppins:wght@300;400;500;600&display=swap');

        * { box-sizing: border-box; margin: 0; padding: 0; }

        .ve-body {
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

        .ve-body::before {
            content: '';
            position: absolute;
            width: 500px; height: 500px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(41,171,226,0.12), transparent 70%);
            top: -180px; right: -150px;
            pointer-events: none;
        }

        .ve-body::after {
            content: '';
            position: absolute;
            width: 380px; height: 380px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(247,148,29,0.08), transparent 70%);
            bottom: -120px; left: -100px;
            pointer-events: none;
        }

        /* Tarjeta */
        .ve-card {
            width: 100%;
            max-width: 460px;
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
            text-align: center;
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
        .ve-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 2rem;
            animation: fadeUp 0.4s ease both 0.1s;
        }

        .ve-logo img {
            width: 40px; height: 40px;
            object-fit: contain;
        }

        .ve-logo-text {
            font-family: 'Nunito', sans-serif;
            font-size: 20px;
            font-weight: 800;
            color: #1A5FA8;
        }

        .ve-logo-text span { color: #F7941D; }

        /* Ícono animado de correo */
        .ve-mail-wrap {
            position: relative;
            width: 90px;
            height: 90px;
            margin: 0 auto 1.75rem;
            animation: fadeUp 0.4s ease both 0.15s;
        }

        .ve-mail-bg {
            width: 90px; height: 90px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(41,171,226,0.12), rgba(26,95,168,0.08));
            border: 2px solid rgba(41,171,226,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            animation: mailPulse 2.5s ease-in-out infinite;
        }

        @keyframes mailPulse {
            0%, 100% { box-shadow: 0 0 0 0 rgba(41,171,226,0.25); }
            50%       { box-shadow: 0 0 0 14px rgba(41,171,226,0); }
        }

        .ve-mail-bg svg {
            width: 42px; height: 42px;
            color: #29ABE2;
        }

        /* Badge naranja flotante */
        .ve-badge {
            position: absolute;
            top: -2px; right: -2px;
            width: 26px; height: 26px;
            background: #F7941D;
            border-radius: 50%;
            border: 2px solid white;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: badgeBounce 1s ease both 0.6s;
        }

        @keyframes badgeBounce {
            0%   { transform: scale(0); }
            60%  { transform: scale(1.2); }
            100% { transform: scale(1); }
        }

        .ve-badge svg {
            width: 13px; height: 13px;
            color: white;
        }

        /* Textos */
        .ve-title {
            font-family: 'Nunito', sans-serif;
            font-size: 24px;
            font-weight: 900;
            color: #1a2b4a;
            margin-bottom: 0.5rem;
            animation: fadeUp 0.4s ease both 0.2s;
        }

        .ve-desc {
            font-size: 13.5px;
            color: #7a8fa6;
            line-height: 1.65;
            margin-bottom: 1.75rem;
            animation: fadeUp 0.4s ease both 0.25s;
        }

        .ve-desc strong {
            color: #1A5FA8;
            font-weight: 600;
        }

        /* Info box */
        .ve-infobox {
            background: #f0f9ff;
            border: 1px solid #bae6fd;
            border-radius: 14px;
            padding: 1rem 1.125rem;
            margin-bottom: 1.75rem;
            text-align: left;
            animation: fadeUp 0.4s ease both 0.3s;
        }

        .ve-infobox-row {
            display: flex;
            align-items: flex-start;
            gap: 0.625rem;
        }

        .ve-infobox-icon {
            flex-shrink: 0;
            width: 32px; height: 32px;
            background: rgba(41,171,226,0.12);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 2px;
        }

        .ve-infobox-icon svg {
            width: 16px; height: 16px;
            color: #29ABE2;
        }

        .ve-infobox-text {
            font-size: 12.5px;
            color: #0369a1;
            line-height: 1.55;
        }

        .ve-infobox-text strong {
            font-weight: 600;
            display: block;
            margin-bottom: 2px;
            color: #075985;
        }

        /* Status */
        .ve-status {
            background: #ecfdf5;
            border: 1px solid #6ee7b7;
            color: #065f46;
            border-radius: 12px;
            padding: 0.875rem 1rem;
            font-size: 13px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            justify-content: center;
            animation: fadeUp 0.3s ease both;
        }

        /* Botón reenviar */
        .ve-btn {
            width: 100%;
            padding: 13px;
            background: linear-gradient(135deg, #29ABE2, #1A5FA8);
            border: none;
            border-radius: 12px;
            color: white;
            font-size: 15px;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
            transition: all 0.2s ease;
            margin-bottom: 1rem;
            animation: fadeUp 0.4s ease both 0.35s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .ve-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 28px rgba(41,171,226,0.32);
        }

        .ve-btn:active { transform: translateY(0); }

        .ve-btn svg { width: 17px; height: 17px; }

        /* Divider */
        .ve-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(41,171,226,0.2), transparent);
            margin: 0.25rem 0 1rem;
            animation: fadeUp 0.4s ease both 0.37s;
        }

        /* Logout */
        .ve-logout {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            font-size: 13px;
            color: #7a8fa6;
            text-decoration: none;
            transition: color 0.2s;
            animation: fadeUp 0.4s ease both 0.4s;
            cursor: pointer;
            background: none;
            border: none;
            font-family: 'Poppins', sans-serif;
            padding: 0;
        }

        .ve-logout:hover { color: #ef4444; }
        .ve-logout svg { width: 14px; height: 14px; }

        /* Pasos */
        .ve-steps {
            display: flex;
            justify-content: center;
            gap: 0.75rem;
            margin-bottom: 1.75rem;
            animation: fadeUp 0.4s ease both 0.28s;
        }

        .ve-step {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.35rem;
        }

        .ve-step-dot {
            width: 32px; height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 700;
            font-family: 'Nunito', sans-serif;
        }

        .ve-step-dot.done {
            background: #1A5FA8;
            color: white;
        }

        .ve-step-dot.active {
            background: #F7941D;
            color: white;
            box-shadow: 0 0 0 4px rgba(247,148,29,0.2);
        }

        .ve-step-dot.pending {
            background: #E5E7EB;
            color: #9CA3AF;
        }

        .ve-step-label {
            font-size: 10px;
            color: #9CA3AF;
            font-weight: 500;
        }

        .ve-step-label.active { color: #F7941D; font-weight: 600; }
        .ve-step-label.done   { color: #1A5FA8; }

        .ve-step-line {
            width: 40px; height: 2px;
            background: #E5E7EB;
            margin-top: 15px;
            border-radius: 1px;
        }

        .ve-step-line.done { background: #1A5FA8; }
    </style>

    <div class="ve-body">
        <div class="ve-card">

            {{-- Logo --}}
            <div class="ve-logo">
                <img src="{{ asset('images/logo.png') }}" alt="AlquilaTec">
                <div class="ve-logo-text">Alquila<span>Tec</span></div>
            </div>

            {{-- Ícono de correo animado --}}
            <div class="ve-mail-wrap">
                <div class="ve-mail-bg">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div class="ve-badge">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
            </div>

            {{-- Título --}}
            <h1 class="ve-title">¡Revisa tu correo!</h1>
            <p class="ve-desc">
                Te enviamos un enlace de verificación a<br>
                <strong>{{ auth()->user()->email }}</strong><br>
                Haz clic en el enlace para activar tu cuenta.
            </p>

            {{-- Pasos --}}
            <div class="ve-steps">
                <div class="ve-step">
                    <div class="ve-step-dot done">✓</div>
                    <span class="ve-step-label done">Registro</span>
                </div>
                <div class="ve-step-line done"></div>
                <div class="ve-step">
                    <div class="ve-step-dot active">2</div>
                    <span class="ve-step-label active">Verificar</span>
                </div>
                <div class="ve-step-line"></div>
                <div class="ve-step">
                    <div class="ve-step-dot pending">3</div>
                    <span class="ve-step-label">Listo</span>
                </div>
            </div>

            {{-- Info box --}}
            <div class="ve-infobox">
                <div class="ve-infobox-row">
                    <div class="ve-infobox-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="ve-infobox-text">
                        <strong>¿No encuentras el correo?</strong>
                        Revisa tu carpeta de spam o correo no deseado. Si aún no lo recibes, haz clic en reenviar.
                    </div>
                </div>
            </div>

            {{-- Status --}}
            @if (session('status') == 'verification-link-sent')
                <div class="ve-status">
                    ✅ Enlace reenviado exitosamente. Revisa tu bandeja.
                </div>
            @endif

            {{-- Botón reenviar --}}
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="ve-btn">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                    </svg>
                    Reenviar correo de verificación
                </button>
            </form>

            <div class="ve-divider"></div>

            {{-- Logout --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="ve-logout">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    Cerrar sesión
                </button>
            </form>

        </div>
    </div>

</x-guest-layout>