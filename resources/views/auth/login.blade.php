<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login — SARP MIS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --sarp-green: #0d7a3c;
            --sarp-green-dark: #065f2e;
            --sarp-green-glow: rgba(13, 122, 60, 0.35);
            --text-primary: #0f172a;
            --text-muted: #64748b;
            --surface: rgba(255, 255, 255, 0.78);
            --surface-border: rgba(255, 255, 255, 0.55);
            --input-bg: rgba(255, 255, 255, 0.92);
            --radius-lg: 20px;
            --radius-md: 12px;
            --shadow-card: 0 25px 50px -12px rgba(15, 23, 42, 0.25), 0 0 0 1px rgba(255, 255, 255, 0.08) inset;
        }

        *, *::before, *::after { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Plus Jakarta Sans', system-ui, sans-serif;
            color: var(--text-primary);
            background: #0a1628 url('{{ asset('assets/images/sarpf.webp') }}') no-repeat center center / cover;
            background-attachment: fixed;
            display: flex;
            flex-direction: column;
        }

        .page-overlay {
            position: fixed;
            inset: 0;
            background:
                linear-gradient(125deg, rgba(6, 40, 20, 0.88) 0%, rgba(6, 40, 20, 0.45) 42%, rgba(10, 22, 40, 0.35) 100%),
                radial-gradient(ellipse 80% 50% at 100% 0%, rgba(13, 122, 60, 0.2), transparent);
            pointer-events: none;
            z-index: 0;
        }

        .login-shell {
            position: relative;
            z-index: 1;
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            padding: clamp(1rem, 3vw, 2rem);
        }

        .brand-bar {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: clamp(0.5rem, 2vw, 1rem);
        }

        .brand-bar img {
            height: clamp(40px, 8vw, 52px);
            width: auto;
            object-fit: contain;
            filter: drop-shadow(0 2px 8px rgba(0, 0, 0, 0.2));
        }

        .login-main {
            flex: 1;
            display: grid;
            grid-template-columns: 1fr minmax(min(100%, 420px), 440px);
            gap: clamp(2rem, 6vw, 4rem);
            align-items: center;
            max-width: 1200px;
            width: 100%;
            margin: 0 auto;
        }

        @media (max-width: 900px) {
            .login-main {
                grid-template-columns: 1fr;
                align-content: center;
            }
            .hero-block {
                text-align: center;
                max-width: 36rem;
                margin: 0 auto;
            }
            .welcome-row { justify-content: center; text-align: center; }
            .welcome-heading-wrap { text-align: center; }
            .welcome-deco-line { margin-left: auto; margin-right: auto; }
            .tagline-row { justify-content: center; text-align: center; }
        }

        .hero-block {
            color: #f8fafc;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: rgba(248, 250, 252, 0.85);
            margin-bottom: 1rem;
        }

        .hero-badge span {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #4ade80;
            box-shadow: 0 0 12px #4ade80;
            animation: pulse-dot 2s ease-in-out infinite;
        }

        @keyframes pulse-dot {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.7; transform: scale(0.9); }
        }

        .hero-title {
            font-size: clamp(1.75rem, 4vw, 2.75rem);
            font-weight: 700;
            line-height: 1.2;
            margin: 0 0 0.75rem;
            letter-spacing: -0.02em;
        }

        .hero-title .accent {
            background: linear-gradient(135deg, #86efac 0%, #4ade80 50%, #22c55e 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .welcome-block {
            margin-bottom: 1.5rem;
            max-width: 28rem;
        }

        @media (max-width: 900px) {
            .welcome-block { margin-left: auto; margin-right: auto; }
        }

        .welcome-row {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 1rem 1.25rem;
            margin-bottom: 0.65rem;
        }

        .welcome-illu {
            flex-shrink: 0;
            width: clamp(52px, 12vw, 72px);
            height: clamp(52px, 12vw, 72px);
            animation: illu-float 4s ease-in-out infinite;
        }

        .welcome-illu svg {
            width: 100%;
            height: 100%;
            display: block;
            filter: drop-shadow(0 4px 12px rgba(34, 197, 94, 0.35));
        }

        @keyframes illu-float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-4px); }
        }

        .welcome-heading {
            margin: 0;
            font-size: clamp(1.35rem, 3.2vw, 1.95rem);
            font-weight: 600;
            line-height: 1.25;
            letter-spacing: -0.02em;
            color: rgba(248, 250, 252, 0.95);
        }

        .welcome-intro {
            font-weight: 500;
            color: rgba(226, 232, 240, 0.88);
            margin-right: 0.35rem;
        }

        .welcome-mis {
            font-weight: 800;
            letter-spacing: -0.03em;
            background: linear-gradient(120deg, #ecfccb 0%, #86efac 35%, #4ade80 55%, #bbf7d0 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-shadow: 0 0 40px rgba(74, 222, 128, 0.25);
        }

        .welcome-deco-line {
            display: block;
            width: 100%;
            max-width: min(100%, 22rem);
            height: auto;
            margin-top: 0.15rem;
            margin-bottom: 0.85rem;
            overflow: visible;
        }

        .welcome-deco-line .deco-path {
            stroke-dasharray: 1;
            stroke-dashoffset: 1;
            animation: deco-draw 2s ease forwards 0.35s;
        }

        @keyframes deco-draw {
            to { stroke-dashoffset: 0; }
        }

        .tagline-row {
            display: flex;
            flex-wrap: wrap;
            align-items: baseline;
            gap: 0.25rem;
            font-size: clamp(0.9rem, 1.8vw, 1.05rem);
            font-weight: 500;
            color: rgba(203, 213, 225, 0.9);
            min-height: 1.5em;
        }

        .tagline-prefix {
            color: rgba(148, 163, 184, 0.95);
            font-weight: 500;
        }

        #typewriter {
            font-weight: 600;
            color: #d9f99d;
            border-right: 2px solid #4ade80;
            padding-right: 4px;
            animation: caret-blink 0.9s step-end infinite;
        }

        @keyframes caret-blink {
            0%, 100% { border-color: #4ade80; }
            50% { border-color: transparent; }
        }

        .hero-desc {
            font-size: 0.95rem;
            line-height: 1.65;
            color: rgba(203, 213, 225, 0.92);
            max-width: 28rem;
            margin: 0;
        }

        @media (max-width: 900px) {
            .hero-desc { margin-left: auto; margin-right: auto; }
        }

        .contact-strip {
            margin-top: 2rem;
            display: flex;
            flex-direction: column;
            gap: 0.65rem;
            font-size: 0.8rem;
            color: rgba(226, 232, 240, 0.88);
        }

        .contact-strip a {
            color: #86efac;
            text-decoration: none;
            transition: color 0.2s;
        }

        .contact-strip a:hover { color: #bbf7d0; }

        .contact-row {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem 1.25rem;
            align-items: center;
        }

        .contact-row i {
            width: 1.1rem;
            color: #4ade80;
            opacity: 0.95;
        }

        /* Card */
        .form-card {
            background: var(--surface);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: var(--radius-lg);
            border: 1px solid var(--surface-border);
            box-shadow: var(--shadow-card);
            padding: clamp(1.75rem, 4vw, 2.5rem);
        }

        .form-card-header {
            text-align: center;
            margin-bottom: 1.75rem;
        }

        .form-card-header h2 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 700;
            letter-spacing: -0.02em;
            color: var(--text-primary);
        }

        .form-card-header p {
            margin: 0.4rem 0 0;
            font-size: 0.875rem;
            color: var(--text-muted);
        }

        .alert-errors {
            background: rgba(254, 226, 226, 0.95);
            border: 1px solid #fecaca;
            color: #991b1b;
            border-radius: var(--radius-md);
            padding: 0.75rem 1rem;
            font-size: 0.8125rem;
            margin-bottom: 1.25rem;
        }

        .alert-errors ul {
            margin: 0;
            padding-left: 1.1rem;
        }

        .field {
            margin-bottom: 1.15rem;
        }

        .field label {
            display: block;
            font-size: 0.8125rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.45rem;
        }

        .input-wrap {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-wrap > i {
            position: absolute;
            left: 14px;
            color: var(--text-muted);
            font-size: 0.95rem;
            pointer-events: none;
            transition: color 0.2s;
        }

        .input-wrap input {
            width: 100%;
            padding: 0.85rem 1rem 0.85rem 2.75rem;
            font-family: inherit;
            font-size: 0.9375rem;
            border: 1.5px solid #e2e8f0;
            border-radius: var(--radius-md);
            background: var(--input-bg);
            color: var(--text-primary);
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .input-wrap input::placeholder {
            color: #94a3b8;
        }

        .input-wrap input:hover {
            border-color: #cbd5e1;
        }

        .input-wrap input:focus {
            outline: none;
            border-color: var(--sarp-green);
            box-shadow: 0 0 0 4px var(--sarp-green-glow);
        }

        .input-wrap:focus-within > i {
            color: var(--sarp-green);
        }

        .input-wrap .toggle-pass {
            position: absolute;
            right: 12px;
            background: none;
            border: none;
            padding: 0.35rem;
            cursor: pointer;
            color: var(--text-muted);
            border-radius: 8px;
            transition: color 0.2s, background 0.2s;
        }

        .input-wrap .toggle-pass:hover {
            color: var(--sarp-green);
            background: rgba(13, 122, 60, 0.08);
        }

        .input-wrap input.has-toggle {
            padding-right: 3rem;
        }

        .error-message {
            display: block;
            margin-top: 0.35rem;
            font-size: 0.75rem;
            color: #b91c1c;
        }

        .remember-row {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.25rem;
        }

        .remember-row input[type="checkbox"] {
            width: 1.05rem;
            height: 1.05rem;
            accent-color: var(--sarp-green);
            cursor: pointer;
        }

        .remember-row label {
            font-size: 0.875rem;
            color: var(--text-muted);
            cursor: pointer;
            user-select: none;
        }

        .btn-submit {
            width: 100%;
            padding: 0.95rem 1.25rem;
            font-family: inherit;
            font-size: 1rem;
            font-weight: 600;
            color: #fff;
            background: linear-gradient(135deg, var(--sarp-green) 0%, var(--sarp-green-dark) 100%);
            border: none;
            border-radius: var(--radius-md);
            cursor: pointer;
            box-shadow: 0 4px 14px rgba(13, 122, 60, 0.4);
            transition: transform 0.15s, box-shadow 0.2s, filter 0.2s;
        }

        .btn-submit:hover {
            filter: brightness(1.05);
            box-shadow: 0 6px 20px rgba(13, 122, 60, 0.45);
        }

        .btn-submit:active {
            transform: scale(0.98);
        }

        .form-footer {
            margin-top: 1.5rem;
            text-align: center;
            font-size: 0.875rem;
            color: var(--text-muted);
            line-height: 1.7;
        }

        .form-footer a {
            color: var(--sarp-green);
            font-weight: 600;
            text-decoration: none;
            transition: color 0.2s;
        }

        .form-footer a:hover {
            color: var(--sarp-green-dark);
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="page-overlay" aria-hidden="true"></div>

    <div class="login-shell">
        <header class="brand-bar">
            <img src="{{ asset('assets/images/name ministry png.png') }}" alt="Ministry">
            <img src="{{ asset('assets/images/ifad.png') }}" alt="IFAD">
            <img src="{{ asset('assets/images/sarp2.png') }}" alt="SARP">
        </header>

        <main class="login-main">
            <div class="hero-block">
                <div class="hero-badge"><span></span> Secure access</div>
                <h1 class="hero-title">
                    <span class="accent">Smallholder Agribusiness</span><br>
                    &amp; Resilience Project
                </h1>
                <div class="welcome-block">
                    <div class="welcome-row">
                        <div class="welcome-illu" aria-hidden="true">
                            <svg viewBox="0 0 80 80" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="">
                                <defs>
                                    <linearGradient id="wl-stem" x1="0%" y1="100%" x2="0%" y2="0%">
                                        <stop offset="0%" stop-color="#166534"/>
                                        <stop offset="100%" stop-color="#4ade80"/>
                                    </linearGradient>
                                    <linearGradient id="wl-leaf" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" stop-color="#bbf7d0"/>
                                        <stop offset="50%" stop-color="#4ade80"/>
                                        <stop offset="100%" stop-color="#22c55e"/>
                                    </linearGradient>
                                </defs>
                                <ellipse cx="40" cy="72" rx="18" ry="5" fill="rgba(34,197,94,0.2)"/>
                                <path d="M40 70 V38" stroke="url(#wl-stem)" stroke-width="3.2" stroke-linecap="round" fill="none"/>
                                <path d="M40 42 C28 36 18 38 14 48 C22 46 32 48 40 44" fill="url(#wl-leaf)" opacity="0.95"/>
                                <path d="M40 38 C52 30 66 34 68 46 C58 42 48 40 40 40" fill="url(#wl-leaf)" opacity="0.88"/>
                                <path d="M40 32 C34 18 40 8 52 12 C46 18 42 26 40 32" fill="url(#wl-leaf)" opacity="0.92"/>
                                <circle cx="40" cy="30" r="3.5" fill="#fef08a" opacity="0.95"/>
                            </svg>
                        </div>
                        <div class="welcome-heading-wrap">
                            <p class="welcome-heading">
                                <span class="welcome-intro">Welcome to</span><span class="welcome-mis">SARP MIS</span>
                            </p>
                        </div>
                    </div>
                    <svg class="welcome-deco-line" viewBox="0 0 320 36" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <defs>
                            <linearGradient id="deco-line-grad" x1="0" y1="0" x2="320" y2="0">
                                <stop stop-color="#22c55e" stop-opacity="0.15"/>
                                <stop offset="0.25" stop-color="#86efac" stop-opacity="0.95"/>
                                <stop offset="0.5" stop-color="#bbf7d0"/>
                                <stop offset="0.75" stop-color="#86efac" stop-opacity="0.95"/>
                                <stop offset="1" stop-color="#22c55e" stop-opacity="0.15"/>
                            </linearGradient>
                            <linearGradient id="deco-dot" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" stop-color="#fef9c3"/>
                                <stop offset="100%" stop-color="#4ade80"/>
                            </linearGradient>
                        </defs>
                        <path class="deco-path" pathLength="1" d="M4 20 C 52 6, 88 30, 160 18 C 232 6, 268 32, 316 18" stroke="url(#deco-line-grad)" stroke-width="2.5" stroke-linecap="round" fill="none"/>
                        <circle cx="52" cy="12" r="4" fill="url(#deco-dot)" opacity="0.85"/>
                        <circle cx="160" cy="16" r="5" fill="#4ade80" opacity="0.9"/>
                        <circle cx="268" cy="14" r="4" fill="url(#deco-dot)" opacity="0.8"/>
                        <path d="M158 22 L162 28 L168 20" stroke="#86efac" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" fill="none" opacity="0.7"/>
                    </svg>
                    <div class="tagline-row">
                        <span class="tagline-prefix">—</span>
                        <span id="typewriter" aria-live="polite"></span>
                    </div>
                </div>
                <p class="hero-desc">
                    Sign in to the SARP Management Information System to manage beneficiaries, training, proposals, and project data in one place.
                </p>
                <div class="contact-strip">
                    <div class="contact-row">
                        <i class="fas fa-phone" aria-hidden="true"></i>
                        <span>+94 11 277 0986 / +94 11 277 0998</span>
                    </div>
                    <div class="contact-row">
                        <i class="fas fa-envelope" aria-hidden="true"></i>
                        <a href="mailto:Info@sarp.lk">Info@sarp.lk</a>
                    </div>
                    <div class="contact-row">
                        <i class="fas fa-globe" aria-hidden="true"></i>
                        <a href="https://www.sarp.lk" target="_blank" rel="noopener noreferrer">www.sarp.lk</a>
                    </div>
                    <div class="contact-row">
                        <i class="fas fa-location-dot" aria-hidden="true"></i>
                        <span>2/2/1, Kandawatta Road, Pelawatta, Battaramulla, Sri Lanka</span>
                    </div>
                </div>
            </div>

            <div class="form-card">
                <div class="form-card-header">
                    <h2>Sign in</h2>
                    <p>Enter your credentials to continue</p>
                </div>

                @if ($errors->any() && !$errors->has('email') && !$errors->has('password'))
                    <div class="alert-errors" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" novalidate>
                    @csrf

                    <div class="field">
                        <label for="email">Email</label>
                        <div class="input-wrap">
                            <i class="fas fa-envelope" aria-hidden="true"></i>
                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="you@example.com"
                                required
                                autofocus
                                autocomplete="username"
                            />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="error-message" />
                    </div>

                    <div class="field">
                        <label for="password">Password</label>
                        <div class="input-wrap">
                            <i class="fas fa-lock" aria-hidden="true"></i>
                            <input
                                id="password"
                                class="has-toggle"
                                type="password"
                                name="password"
                                placeholder="••••••••"
                                required
                                autocomplete="current-password"
                            />
                            <button type="button" class="toggle-pass" id="togglePassword" aria-label="Show password">
                                <i class="fas fa-eye" aria-hidden="true"></i>
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="error-message" />
                    </div>

                    <div class="remember-row">
                        <input id="remember_me" type="checkbox" name="remember">
                        <label for="remember_me">Remember me on this device</label>
                    </div>

                    <button type="submit" class="btn-submit">Log in</button>

                    <div class="form-footer">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">Forgot your password?</a>
                            <br>
                        @endif
                        <span>Need an account? <a href="{{ route('register') }}">Register</a></span>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <script>
        (function () {
            var el = document.getElementById('typewriter');
            if (!el) return;
            var phrases = [
                'Management Information System.',
                'Agribusiness & resilience insights.',
                'Your digital project workspace.'
            ];
            var phraseIndex = 0;
            var charIndex = 0;
            var deleting = false;
            var pauseEnd = 2000;
            var pauseStart = 400;
            var typeSpeed = 55;
            var deleteSpeed = 35;

            function tick() {
                var phrase = phrases[phraseIndex];
                if (!deleting) {
                    if (charIndex < phrase.length) {
                        el.textContent = phrase.slice(0, charIndex + 1);
                        charIndex++;
                        setTimeout(tick, typeSpeed);
                    } else {
                        setTimeout(function () { deleting = true; tick(); }, pauseEnd);
                    }
                } else {
                    if (charIndex > 0) {
                        charIndex--;
                        el.textContent = phrase.slice(0, charIndex);
                        setTimeout(tick, deleteSpeed);
                    } else {
                        deleting = false;
                        phraseIndex = (phraseIndex + 1) % phrases.length;
                        setTimeout(tick, pauseStart);
                    }
                }
            }
            tick();
        })();

        document.getElementById('togglePassword')?.addEventListener('click', function () {
            var input = document.getElementById('password');
            var icon = this.querySelector('i');
            if (!input || !icon) return;
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
                this.setAttribute('aria-label', 'Hide password');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
                this.setAttribute('aria-label', 'Show password');
            }
        });
    </script>
</body>
</html>
