@php
    $rawMessage = $exception->getMessage();
    $displayMessage = filled($rawMessage) && $rawMessage !== 'Forbidden'
        ? $rawMessage
        : __('You do not have permission to view or change this resource.');
    $hintEmail = config('sarp.login_hint_email');
    $hintPassword = config('sarp.login_hint_password');
    $hintOk = filled($hintEmail);
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Access restricted') }} — SARP MIS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --sarp-green: #0d7a3c;
            --sarp-green-dark: #065f2e;
            --sarp-green-glow: rgba(13, 122, 60, 0.4);
            --text: #0f172a;
            --muted: #64748b;
            --card: rgba(255, 255, 255, 0.92);
            --radius: 22px;
            --shadow: 0 25px 60px -15px rgba(15, 23, 42, 0.35), 0 0 0 1px rgba(255, 255, 255, 0.6) inset;
        }

        *, *::before, *::after { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Plus Jakarta Sans', system-ui, sans-serif;
            color: var(--text);
            background: #0a1628 url('{{ asset('assets/images/sarpf.webp') }}') no-repeat center center / cover;
            background-attachment: fixed;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: clamp(1rem, 4vw, 2rem);
        }

        .backdrop {
            position: fixed;
            inset: 0;
            background:
                linear-gradient(145deg, rgba(6, 40, 20, 0.9) 0%, rgba(6, 40, 20, 0.5) 45%, rgba(10, 22, 40, 0.4) 100%),
                radial-gradient(ellipse 90% 60% at 50% -10%, rgba(13, 122, 60, 0.25), transparent 55%);
            pointer-events: none;
            z-index: 0;
        }

        .modal-wrap {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 440px;
            animation: modalIn 0.55s cubic-bezier(0.22, 1, 0.36, 1) forwards;
        }

        @keyframes modalIn {
            from {
                opacity: 0;
                transform: translateY(18px) scale(0.97);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .modal {
            background: var(--card);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border-radius: var(--radius);
            border: 1px solid rgba(255, 255, 255, 0.65);
            box-shadow: var(--shadow);
            padding: clamp(1.75rem, 5vw, 2.25rem);
            text-align: center;
        }

        .icon-ring {
            width: 88px;
            height: 88px;
            margin: 0 auto 1.25rem;
            border-radius: 50%;
            background: linear-gradient(145deg, rgba(240, 253, 244, 0.95) 0%, rgba(255, 255, 255, 0.9) 100%);
            border: 2px solid rgba(13, 122, 60, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 12px 40px -8px rgba(13, 122, 60, 0.25);
        }

        .icon-ring i {
            font-size: 2.25rem;
            color: var(--sarp-green);
        }

        .code-pill {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.35rem 0.85rem;
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: #b45309;
            background: linear-gradient(180deg, #fffbeb 0%, #fef3c7 100%);
            border: 1px solid rgba(245, 158, 11, 0.35);
            border-radius: 999px;
            margin-bottom: 0.85rem;
        }

        h1 {
            margin: 0 0 0.65rem;
            font-size: clamp(1.35rem, 4vw, 1.6rem);
            font-weight: 700;
            letter-spacing: -0.03em;
            color: var(--text);
            line-height: 1.25;
        }

        .message {
            margin: 0 0 1.5rem;
            font-size: 0.9375rem;
            line-height: 1.65;
            color: var(--muted);
            font-weight: 500;
        }

        .actions {
            display: flex;
            flex-direction: column;
            gap: 0.65rem;
        }

        @media (min-width: 400px) {
            .actions {
                flex-direction: row;
                justify-content: center;
                flex-wrap: wrap;
            }
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.8rem 1.35rem;
            font-family: inherit;
            font-size: 0.9rem;
            font-weight: 600;
            border-radius: 12px;
            text-decoration: none;
            cursor: pointer;
            border: none;
            transition: transform 0.15s, box-shadow 0.2s, filter 0.2s;
        }

        .btn:active { transform: scale(0.98); }

        .btn-primary {
            color: #fff;
            background: linear-gradient(135deg, var(--sarp-green) 0%, var(--sarp-green-dark) 100%);
            box-shadow: 0 4px 18px rgba(13, 122, 60, 0.38);
        }

        .btn-primary:hover {
            filter: brightness(1.06);
            box-shadow: 0 6px 22px rgba(13, 122, 60, 0.45);
        }

        .btn-ghost {
            color: var(--sarp-green);
            background: rgba(13, 122, 60, 0.08);
            border: 1.5px solid rgba(13, 122, 60, 0.22);
        }

        .btn-ghost:hover {
            background: rgba(13, 122, 60, 0.14);
            border-color: rgba(13, 122, 60, 0.35);
        }

        .hint-block {
            margin-top: 1.35rem;
            padding-top: 1.2rem;
            border-top: 1px solid rgba(226, 232, 240, 0.95);
            text-align: left;
        }

        .hint-toggle {
            width: 100%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.45rem;
            padding: 0.5rem 0.85rem;
            font-family: inherit;
            font-size: 0.8125rem;
            font-weight: 600;
            color: var(--sarp-green);
            background: rgba(13, 122, 60, 0.07);
            border: 1px solid rgba(13, 122, 60, 0.2);
            border-radius: 999px;
            cursor: pointer;
            transition: background 0.2s;
        }

        .hint-toggle:hover { background: rgba(13, 122, 60, 0.12); }

        .hint-panel {
            margin-top: 0.85rem;
            padding: 0.9rem 1rem;
            font-size: 0.8125rem;
            line-height: 1.5;
            color: var(--text);
            background: linear-gradient(180deg, rgba(240, 253, 244, 0.55) 0%, rgba(255, 255, 255, 0.95) 100%);
            border: 1px solid rgba(13, 122, 60, 0.18);
            border-radius: 12px;
        }

        .hint-panel[hidden] {
            display: none !important;
        }

        .hint-panel p.lead {
            margin: 0 0 0.65rem;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--sarp-green);
            text-align: center;
        }

        .cred {
            display: grid;
            gap: 0.45rem;
        }

        .cred-row {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 0.5rem;
            padding: 0.45rem 0.6rem;
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
        }

        .cred-row dt {
            margin: 0;
            font-family: inherit;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: var(--muted);
            min-width: 4.75rem;
        }

        .cred-row dd {
            margin: 0;
            flex: 1;
            min-width: 0;
            font-family: 'Plus Jakarta Sans', 'Segoe UI', system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
            font-size: 0.9375rem;
            font-weight: 600;
            letter-spacing: 0.02em;
            line-height: 1.5;
            color: var(--text);
            word-break: break-word;
            overflow-wrap: anywhere;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-rendering: optimizeLegibility;
        }

        .hint-muted {
            margin: 0.65rem 0 0;
            font-size: 0.78rem;
            color: var(--muted);
            text-align: center;
        }

        .brand-foot {
            margin-top: 1.5rem;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            gap: 0.65rem;
            opacity: 0.9;
        }

        .brand-foot img {
            height: 36px;
            width: auto;
            object-fit: contain;
            filter: drop-shadow(0 2px 8px rgba(0, 0, 0, 0.15));
        }
    </style>
</head>
<body>
    <div class="backdrop" aria-hidden="true"></div>

    <div class="modal-wrap" role="dialog" aria-modal="true" aria-labelledby="err-title" aria-describedby="err-desc">
        <div class="modal">
            <div class="icon-ring" aria-hidden="true">
                <i class="fas fa-shield-halved"></i>
            </div>
            <div class="code-pill">
                <i class="fas fa-lock" style="font-size:0.65rem;"></i>
                {{ __('Error') }} 403
            </div>
            <h1 id="err-title">{{ __('Access restricted') }}</h1>
            <p id="err-desc" class="message">{{ $displayMessage }}</p>

            <div class="actions">
                <button type="button" class="btn btn-ghost" onclick="history.length > 1 ? history.back() : (window.location.href='{{ url('/') }}')">
                    <i class="fas fa-arrow-left" aria-hidden="true"></i>
                    {{ __('Go back') }}
                </button>
                @if (Route::has('dashboard'))
                    <a href="{{ route('dashboard') }}" class="btn btn-primary">
                        <i class="fas fa-house" aria-hidden="true"></i>
                        {{ __('Dashboard') }}
                    </a>
                @endif
            </div>

            <div class="hint-block">
                <button type="button" class="hint-toggle" id="err403HintBtn" aria-expanded="false" aria-controls="err403HintPanel">
                    <i class="fas fa-circle-info" aria-hidden="true"></i>
                    {{ __('View-only sign-in hint') }}
                    <i class="fas fa-chevron-down" id="err403HintChev" style="font-size:0.65rem;transition:transform .2s;" aria-hidden="true"></i>
                </button>
                <div id="err403HintPanel" class="hint-panel" role="region" aria-labelledby="err403HintBtn" aria-hidden="true" hidden>
                    @if ($hintOk)
                        <p class="lead">{{ __('View-only sign-in') }}</p>
                        <dl class="cred">
                            <div class="cred-row">
                                <dt>{{ __('Email') }}</dt>
                                <dd>{{ $hintEmail }}</dd>
                            </div>
                            <div class="cred-row">
                                <dt>{{ __('Password') }}</dt>
                                <dd>{{ filled($hintPassword) ? $hintPassword : '—' }}</dd>
                            </div>
                        </dl>
                        <p class="hint-muted">{{ __('Sign out first if you are using another account, then sign in with the details above.') }}</p>
                    @else
                        <p class="hint-muted" style="margin:0;">{{ __('Demo credentials are not configured.') }}</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="brand-foot">
            <img src="{{ asset('assets/images/name ministry png.png') }}" alt="">
            <img src="{{ asset('assets/images/ifad.png') }}" alt="">
            <img src="{{ asset('assets/images/sarp2.png') }}" alt="">
        </div>
    </div>

    <script>
        (function () {
            var btn = document.getElementById('err403HintBtn');
            var panel = document.getElementById('err403HintPanel');
            var chev = document.getElementById('err403HintChev');
            if (!btn || !panel) return;
            btn.addEventListener('click', function () {
                var wasOpen = btn.getAttribute('aria-expanded') === 'true';
                var nowOpen = !wasOpen;
                btn.setAttribute('aria-expanded', nowOpen ? 'true' : 'false');
                panel.hidden = !nowOpen;
                panel.setAttribute('aria-hidden', nowOpen ? 'false' : 'true');
                if (chev) chev.style.transform = nowOpen ? 'rotate(180deg)' : '';
            });
        })();
    </script>
</body>
</html>
