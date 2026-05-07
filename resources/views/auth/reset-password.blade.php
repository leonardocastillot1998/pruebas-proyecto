<x-guest-layout>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Poppins:wght@300;400;500;600&display=swap');

    * { box-sizing: border-box; margin: 0; padding: 0; }

    .rp-body {
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

    /* Círculos decorativos de fondo (mismo estilo que forgot-password) */
    .rp-body::before {
        content: '';
        position: absolute;
        width: 500px; height: 500px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(41,171,226,0.12), transparent 70%);
        top: -180px; right: -150px;
        pointer-events: none;
    }

    .rp-body::after {
        content: '';
        position: absolute;
        width: 380px; height: 380px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(247,148,29,0.08), transparent 70%);
        bottom: -120px; left: -100px;
        pointer-events: none;
    }

    /* Tarjeta */
    .rp-card {
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
    }

    @keyframes cardIn {
        from { opacity: 0; transform: translateY(24px) scale(0.98); }
        to   { opacity: 1; transform: translateY(0) scale(1); }
    }

    /* Logo */
    .rp-logo {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 1.75rem;
        animation: fadeUp 0.4s ease both;
        animation-delay: 0.1s;
    }

    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(10px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    .rp-logo img {
        width: 40px; height: 40px;
        object-fit: contain;
    }

    .rp-logo-text {
        font-family: 'Nunito', sans-serif;
        font-size: 20px;
        font-weight: 800;
        color: #1A5FA8;
    }

    .rp-logo-text span { color: #F7941D; }

    /* Ícono central */
    .rp-icon {
        width: 58px; height: 58px;
        border-radius: 16px;
        background: linear-gradient(135deg, #e8f4fd, #d0ebf9);
        border: 1.5px solid rgba(41,171,226,0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.25rem;
        animation: fadeUp 0.4s ease both;
        animation-delay: 0.15s;
    }

    .rp-icon svg { width: 28px; height: 28px; color: #29ABE2; }

    /* Títulos */
    .rp-title {
        font-family: 'Nunito', sans-serif;
        font-size: 24px;
        font-weight: 800;
        color: #1a2b4a;
        margin-bottom: 6px;
        animation: fadeUp 0.4s ease both;
        animation-delay: 0.18s;
    }

    .rp-subtitle {
        font-size: 13.5px;
        color: #7a8fa6;
        line-height: 1.6;
        margin-bottom: 1.75rem;
        animation: fadeUp 0.4s ease both;
        animation-delay: 0.2s;
    }

    /* Divisor */
    .rp-divider {
        height: 1px;
        background: linear-gradient(90deg, transparent, rgba(41,171,226,0.2), transparent);
        margin-bottom: 1.75rem;
        animation: fadeUp 0.4s ease both;
        animation-delay: 0.22s;
    }

    /* Campos */
    .rp-field {
        margin-bottom: 1rem;
        animation: fadeUp 0.4s ease both;
    }

    .rp-field:nth-child(1) { animation-delay: 0.24s; }
    .rp-field:nth-child(2) { animation-delay: 0.28s; }
    .rp-field:nth-child(3) { animation-delay: 0.32s; }

    .rp-label {
        display: block;
        font-size: 13px;
        font-weight: 600;
        color: #374151;
        margin-bottom: 6px;
    }

    .rp-input-wrap { position: relative; }

    .rp-input-icon {
        position: absolute;
        left: 13px; top: 50%;
        transform: translateY(-50%);
        color: #b0c8de;
        pointer-events: none;
    }

    .rp-input-icon svg { width: 16px; height: 16px; }

    .rp-input {
        width: 100%;
        padding: 11px 16px 11px 40px;
        border: 1.5px solid #dce8f5;
        border-radius: 12px;
        font-size: 14px;
        font-family: 'Poppins', sans-serif;
        color: #1a2b4a;
        background: #f7fbff;
        transition: all 0.2s ease;
        outline: none;
    }

    .rp-input::placeholder { color: #b0c8de; }

    .rp-input:focus {
        border-color: #29ABE2;
        background: white;
        box-shadow: 0 0 0 3px rgba(41,171,226,0.12);
    }

    /* Toggle ojo */
    .rp-eye {
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

    .rp-eye:hover { color: #29ABE2; }
    .rp-eye svg { width: 16px; height: 16px; }

    /* Medidor fortaleza */
    .rp-meter { margin-top: 7px; display: none; }

    .rp-meter-bars { display: flex; gap: 4px; margin-bottom: 3px; }

    .rp-bar {
        flex: 1; height: 3px;
        border-radius: 2px;
        background: #dce8f5;
        transition: background 0.3s;
    }

    .rp-bar.weak   { background: #ef4444; }
    .rp-bar.medium { background: #F7941D; }
    .rp-bar.strong { background: #22c55e; }

    .rp-meter-label { font-size: 11px; color: #9db4cc; transition: color 0.3s; }

    /* Error */
    .rp-error {
        font-size: 12px; color: #ef4444;
        margin-top: 4px;
        display: flex; align-items: center; gap: 4px;
    }

    .rp-error svg { width: 12px; height: 12px; flex-shrink: 0; }

    /* Requisitos */
    .rp-reqs {
        background: #f4f9ff;
        border: 1px solid #dce8f5;
        border-radius: 12px;
        padding: 11px 14px;
        margin: 1rem 0 1.25rem;
        animation: fadeUp 0.4s ease both;
        animation-delay: 0.34s;
    }

    .rp-reqs-title {
        font-size: 11px;
        font-weight: 600;
        color: #9db4cc;
        text-transform: uppercase;
        letter-spacing: 0.6px;
        margin-bottom: 7px;
    }

    .rp-req {
        display: flex; align-items: center; gap: 7px;
        font-size: 12px; color: #9db4cc;
        margin-bottom: 4px;
        transition: color 0.25s;
    }

    .rp-req:last-child { margin-bottom: 0; }
    .rp-req svg { width: 12px; height: 12px; flex-shrink: 0; }
    .rp-req.met { color: #22c55e; }

    /* Botón */
    .rp-btn {
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
        margin-bottom: 1.1rem;
        animation: fadeUp 0.4s ease both;
        animation-delay: 0.38s;
    }

    .rp-btn:hover { transform: translateY(-2px); box-shadow: 0 10px 28px rgba(41,171,226,0.32); }
    .rp-btn:active { transform: translateY(0); }

    /* Volver */
    .rp-back {
        display: flex; align-items: center; justify-content: center; gap: 6px;
        font-size: 13px; color: #7a8fa6;
        text-decoration: none;
        transition: color 0.2s;
        animation: fadeUp 0.4s ease both;
        animation-delay: 0.4s;
    }

    .rp-back:hover { color: #1A5FA8; }
    .rp-back svg { width: 14px; height: 14px; }
</style>

<div class="rp-body">
    <div class="rp-card">

        <!-- Logo -->
        <div class="rp-logo">
            <img src="{{ asset('images/logo.png') }}" alt="AlquilaTec">
            <div class="rp-logo-text">Alquila<span>Tec</span></div>
        </div>

        <!-- Ícono -->
        <div class="rp-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                <circle cx="12" cy="16" r="1" fill="currentColor"/>
            </svg>
        </div>

        <!-- Texto -->
        <h1 class="rp-title">Nueva contraseña</h1>
        <p class="rp-subtitle">Elige una contraseña segura para proteger tu cuenta en AlquilaTec.</p>

        <div class="rp-divider"></div>

        <!-- Formulario -->
        <form method="POST" action="{{ route('password.store') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email -->
            <div class="rp-field">
                <label class="rp-label" for="email">Correo electrónico</label>
                <div class="rp-input-wrap">
                    <span class="rp-input-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    </span>
                    <input id="email" class="rp-input" type="email" name="email"
                        value="{{ old('email', $request->email) }}"
                        required autocomplete="username" placeholder="tu@correo.com">
                </div>
                @error('email')
                    <p class="rp-error">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Nueva contraseña -->
            <div class="rp-field">
                <label class="rp-label" for="password">Nueva contraseña</label>
                <div class="rp-input-wrap">
                    <span class="rp-input-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                    </span>
                    <input id="password" class="rp-input" type="password" name="password"
                        required autocomplete="new-password" placeholder="••••••••"
                        style="padding-right: 40px"
                        oninput="handleStrength(this.value)">
                    <button type="button" class="rp-eye" onclick="togglePw('password', this)">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                    </button>
                </div>
                <div class="rp-meter" id="meter">
                    <div class="rp-meter-bars">
                        <div class="rp-bar" id="b1"></div>
                        <div class="rp-bar" id="b2"></div>
                        <div class="rp-bar" id="b3"></div>
                        <div class="rp-bar" id="b4"></div>
                    </div>
                    <span class="rp-meter-label" id="mLabel"></span>
                </div>
                @error('password')
                    <p class="rp-error">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Confirmar contraseña -->
            <div class="rp-field">
                <label class="rp-label" for="password_confirmation">Confirmar contraseña</label>
                <div class="rp-input-wrap">
                    <span class="rp-input-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 12l2 2 4-4"/><circle cx="12" cy="12" r="10"/></svg>
                    </span>
                    <input id="password_confirmation" class="rp-input" type="password"
                        name="password_confirmation" required autocomplete="new-password"
                        placeholder="••••••••" style="padding-right: 40px">
                    <button type="button" class="rp-eye" onclick="togglePw('password_confirmation', this)">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                    </button>
                </div>
                @error('password_confirmation')
                    <p class="rp-error">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Requisitos -->
            <div class="rp-reqs">
                <div class="rp-reqs-title">Tu contraseña debe tener</div>
                <div class="rp-req" id="r-len">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/></svg>
                    Mínimo 8 caracteres
                </div>
                <div class="rp-req" id="r-upper">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/></svg>
                    Al menos una mayúscula
                </div>
                <div class="rp-req" id="r-num">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/></svg>
                    Al menos un número
                </div>
                <div class="rp-req" id="r-special">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/></svg>
                    Al menos un carácter especial (!@#$...)
                </div>
            </div>

            <button type="submit" class="rp-btn">Restablecer contraseña</button>
        </form>

        <a href="{{ route('login') }}" class="rp-back">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
            Volver al inicio de sesión
        </a>
    </div>
</div>

<script>
    function togglePw(id, btn) {
        const inp = document.getElementById(id);
        const show = inp.type === 'password';
        inp.type = show ? 'text' : 'password';
        btn.innerHTML = show
            ? `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:16px;height:16px"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>`
            : `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:16px;height:16px"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>`;
    }

    function handleStrength(val) {
        const meter = document.getElementById('meter');
        if (!val) { meter.style.display = 'none'; return; }
        meter.style.display = 'block';

        const c = {
            len:     val.length >= 8,
            upper:   /[A-Z]/.test(val),
            num:     /[0-9]/.test(val),
            special: /[^A-Za-z0-9]/.test(val),
        };

        setReq('r-len', c.len); setReq('r-upper', c.upper);
        setReq('r-num', c.num); setReq('r-special', c.special);

        const score = Object.values(c).filter(Boolean).length;
        const bars = ['b1','b2','b3','b4'].map(id => document.getElementById(id));
        const label = document.getElementById('mLabel');
        bars.forEach(b => { b.className = 'rp-bar'; });

        const lvls = [
            { cls:'weak',   txt:'Débil',       col:'#ef4444' },
            { cls:'medium', txt:'Regular',      col:'#F7941D' },
            { cls:'medium', txt:'Buena',        col:'#84cc16' },
            { cls:'strong', txt:'Muy segura ✓', col:'#22c55e' },
        ];

        if (score > 0) {
            const l = lvls[score - 1];
            for (let i = 0; i < score; i++) bars[i].classList.add(l.cls);
            label.textContent = l.txt;
            label.style.color = l.col;
        }
    }

    function setReq(id, met) {
        const el = document.getElementById(id);
        if (!el) return;
        el.classList.toggle('met', met);
        el.querySelector('svg').innerHTML = met
            ? '<polyline points="20 6 9 17 4 12" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>'
            : '<circle cx="12" cy="12" r="10"/>';
    }
</script>
</x-guest-layout>