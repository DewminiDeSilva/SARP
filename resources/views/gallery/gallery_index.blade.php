<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery — SARP</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,600;0,700;1,500&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --g-ink: #0c1a12;
            --g-forest: #126926;
            --g-forest-deep: #0a4818;
            --g-sage: #5c7a62;
            --g-cream: #faf8f4;
            --g-paper: #f3efe8;
            --g-gold: #c4a35a;
            --g-gold-soft: rgba(196, 163, 90, 0.35);
            --g-shadow: rgba(12, 26, 18, 0.12);
            --g-shadow-deep: rgba(12, 26, 18, 0.22);
        }

        .frame {
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            align-items: stretch;
            width: 100%;
            min-height: 100vh;
        }

        .left-column {
            flex: 0 0 20%;
            max-width: 20%;
            border-right: 1px solid rgba(18, 105, 38, 0.1);
            background: linear-gradient(180deg, #fafcf9 0%, #f0f4f1 100%);
        }

        .right-column {
            flex: 1 1 80%;
            min-width: 0;
            max-width: 80%;
            padding: 0;
            background: var(--g-cream);
        }

        .frame.sidebar-collapsed .left-column {
            display: none !important;
        }
        .frame.sidebar-collapsed .right-column {
            flex: 1 1 100% !important;
            max-width: 100% !important;
        }

        body {
            background-color: var(--g-cream);
            font-family: 'Outfit', system-ui, sans-serif;
            color: var(--g-ink);
        }

        /* —— Page shell —— */
        .gallery-shell {
            position: relative;
            overflow: hidden;
            min-height: calc(100vh - 70px);
        }

        .gallery-shell::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(ellipse 120% 80% at 0% -20%, rgba(18, 105, 38, 0.09), transparent 55%),
                radial-gradient(ellipse 90% 60% at 100% 10%, rgba(196, 163, 90, 0.08), transparent 50%),
                radial-gradient(ellipse 70% 50% at 50% 100%, rgba(92, 122, 98, 0.06), transparent 45%);
            pointer-events: none;
            z-index: 0;
        }

        .gallery-shell::after {
            content: '';
            position: absolute;
            inset: 0;
            opacity: 0.04;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.8' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 0;
        }

        .gallery-inner {
            position: relative;
            z-index: 1;
            max-width: 1320px;
            margin: 0 auto;
            padding: 28px 24px 56px;
        }

        @media (min-width: 1200px) {
            .gallery-inner { padding: 36px 40px 64px; }
        }

        /* —— Hero —— */
        .gallery-hero {
            text-align: center;
            margin-bottom: clamp(2rem, 5vw, 3.25rem);
            padding: clamp(1.5rem, 4vw, 2.5rem) 1rem 0;
        }

        .gallery-hero__eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.7rem;
            font-weight: 600;
            letter-spacing: 0.28em;
            text-transform: uppercase;
            color: var(--g-sage);
            margin-bottom: 1rem;
        }

        .gallery-hero__eyebrow::before,
        .gallery-hero__eyebrow::after {
            content: '';
            width: 32px;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--g-gold-soft), transparent);
        }

        .gallery-hero__title {
            font-family: 'Cormorant Garamond', Georgia, serif;
            font-size: clamp(2.75rem, 6vw, 4.25rem);
            font-weight: 600;
            line-height: 1.08;
            letter-spacing: -0.02em;
            color: var(--g-ink);
            margin: 0 0 0.75rem;
        }

        .gallery-hero__title span {
            font-style: italic;
            font-weight: 500;
            color: var(--g-forest);
        }

        .gallery-hero__lead {
            font-size: clamp(0.95rem, 1.5vw, 1.1rem);
            font-weight: 300;
            color: #4a5c52;
            max-width: 36rem;
            margin: 0 auto;
            line-height: 1.65;
        }

        .gallery-hero__accent {
            width: 48px;
            height: 3px;
            margin: 1.5rem auto 0;
            border-radius: 2px;
            background: linear-gradient(90deg, var(--g-forest), var(--g-gold), var(--g-forest-deep));
            opacity: 0.85;
        }

        /* —— Grid —— */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: clamp(1.25rem, 3vw, 2rem);
        }

        @media (min-width: 768px) {
            .gallery-grid {
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            }
        }

        /* —— Art card (picture frame) —— */
        .gallery-art-btn {
            display: block;
            width: 100%;
            padding: 0;
            border: none;
            background: none;
            cursor: pointer;
            text-align: left;
            -webkit-tap-highlight-color: transparent;
        }

        .gallery-art-btn:focus-visible {
            outline: 2px solid var(--g-forest);
            outline-offset: 4px;
            border-radius: 4px;
        }

        .gallery-art-card {
            position: relative;
            border-radius: 4px;
            overflow: hidden;
            background: linear-gradient(145deg, #ebe6dc 0%, #d8d2c6 45%, #e8e3d9 100%);
            padding: 12px;
            box-shadow:
                0 2px 4px var(--g-shadow),
                0 12px 28px var(--g-shadow-deep),
                inset 0 1px 0 rgba(255, 255, 255, 0.65);
            transition: transform 0.45s cubic-bezier(0.22, 1, 0.36, 1),
                box-shadow 0.45s ease;
        }

        .gallery-art-btn:hover .gallery-art-card,
        .gallery-art-btn:focus-visible .gallery-art-card {
            transform: translateY(-6px);
            box-shadow:
                0 4px 8px rgba(12, 26, 18, 0.08),
                0 20px 40px rgba(18, 105, 38, 0.15),
                inset 0 1px 0 rgba(255, 255, 255, 0.8);
        }

        .gallery-art-card__mat {
            position: relative;
            border-radius: 2px;
            overflow: hidden;
            aspect-ratio: 4 / 3;
            background: #0a0f0c;
            box-shadow:
                inset 0 0 0 1px rgba(255, 255, 255, 0.12),
                inset 0 0 0 5px rgba(250, 248, 244, 0.08);
        }

        .gallery-art-card__img {
            position: relative;
            z-index: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.65s cubic-bezier(0.22, 1, 0.36, 1), filter 0.5s ease;
            filter: saturate(1.02) contrast(1.02);
        }

        .gallery-art-btn:hover .gallery-art-card__img,
        .gallery-art-btn:focus-visible .gallery-art-card__img {
            transform: scale(1.06);
            filter: saturate(1.08) contrast(1.04) brightness(1.02);
        }

        .gallery-art-card__shine {
            position: absolute;
            inset: 0;
            border-radius: 2px;
            pointer-events: none;
            z-index: 2;
            opacity: 0;
            background: linear-gradient(
                125deg,
                transparent 40%,
                rgba(255, 255, 255, 0.15) 48%,
                rgba(255, 255, 255, 0.22) 50%,
                transparent 58%
            );
            background-size: 200% 200%;
            background-position: 100% 100%;
            transition: opacity 0.4s ease, background-position 0.6s ease;
        }

        .gallery-art-btn:hover .gallery-art-card__shine {
            opacity: 1;
            background-position: 0% 0%;
        }

        .gallery-art-card__vignette {
            position: absolute;
            inset: 0;
            border-radius: 2px;
            pointer-events: none;
            z-index: 1;
            box-shadow: inset 0 0 48px rgba(0, 0, 0, 0.25);
            opacity: 0.7;
            transition: opacity 0.4s ease;
        }

        .gallery-art-btn:hover .gallery-art-card__vignette {
            opacity: 0.45;
        }

        .gallery-art-card__caption {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            padding: 1rem 1.1rem 1.1rem;
            background: linear-gradient(
                to top,
                rgba(8, 22, 14, 0.92) 0%,
                rgba(8, 22, 14, 0.65) 55%,
                transparent 100%
            );
            z-index: 3;
            text-align: left;
        }

        .gallery-art-card__label {
            font-family: 'Cormorant Garamond', Georgia, serif;
            font-size: clamp(1.35rem, 2.8vw, 1.65rem);
            font-weight: 600;
            color: #faf8f4;
            letter-spacing: 0.02em;
            line-height: 1.2;
            display: block;
            text-shadow: 0 2px 12px rgba(0, 0, 0, 0.35);
        }

        .gallery-art-card__hint {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            margin-top: 0.4rem;
            font-size: 0.72rem;
            font-weight: 500;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: rgba(250, 248, 244, 0.75);
            opacity: 0;
            transform: translateY(6px);
            transition: opacity 0.35s ease, transform 0.35s ease;
        }

        .gallery-art-btn:hover .gallery-art-card__hint,
        .gallery-art-btn:focus-visible .gallery-art-card__hint {
            opacity: 1;
            transform: translateY(0);
        }

        /* Stagger entrance */
        .gallery-grid > * {
            animation: gallery-rise 0.7s cubic-bezier(0.22, 1, 0.36, 1) backwards;
        }
        .gallery-grid > *:nth-child(1) { animation-delay: 0.05s; }
        .gallery-grid > *:nth-child(2) { animation-delay: 0.1s; }
        .gallery-grid > *:nth-child(3) { animation-delay: 0.15s; }
        .gallery-grid > *:nth-child(4) { animation-delay: 0.2s; }
        .gallery-grid > *:nth-child(5) { animation-delay: 0.25s; }
        .gallery-grid > *:nth-child(6) { animation-delay: 0.3s; }
        .gallery-grid > *:nth-child(7) { animation-delay: 0.35s; }
        .gallery-grid > *:nth-child(8) { animation-delay: 0.4s; }
        .gallery-grid > *:nth-child(9) { animation-delay: 0.45s; }
        .gallery-grid > *:nth-child(n+10) { animation-delay: 0.5s; }

        @keyframes gallery-rise {
            from {
                opacity: 0;
                transform: translateY(22px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .gallery-grid > *,
            .gallery-art-card,
            .gallery-art-card__img,
            .gallery-art-card__shine,
            .gallery-art-card__hint {
                animation: none !important;
                transition: none !important;
            }
            .gallery-art-btn:hover .gallery-art-card,
            .gallery-art-btn:hover .gallery-art-card__img {
                transform: none;
            }
        }

        /* Toolbar row */
        .gallery-toolbar {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 16px 24px 0;
            max-width: 1320px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        #sidebarToggle {
            background: linear-gradient(135deg, var(--g-forest) 0%, var(--g-forest-deep) 100%);
            color: #fff;
            border: none;
            padding: 10px 14px;
            border-radius: 10px;
            cursor: pointer;
            box-shadow: 0 4px 14px rgba(18, 105, 38, 0.28);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        #sidebarToggle:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 18px rgba(18, 105, 38, 0.35);
        }

        .sidebar {
            transition: transform 0.3s ease;
        }

        .sidebar.hidden {
            transform: translateX(-100%);
        }

        .left-column.hidden {
            display: none;
        }

        .right-column {
            transition: flex 0.3s ease, padding 0.3s ease;
        }
    </style>
</head>
<body>
@include('dashboard.header')
<div class="frame" id="sarpAppFrame" style="padding-top: 70px;">
    <div class="left-column" id="sarpSidebar">
        @include('dashboard.dashboardC')
        @csrf
    </div>
    <div class="right-column">
        <div class="gallery-toolbar">
            <button type="button" id="sidebarToggle" aria-controls="sarpSidebar" aria-expanded="true" title="Hide menu" aria-label="Toggle menu">
                <i class="fas fa-bars" aria-hidden="true"></i>
            </button>
        </div>

        <div class="gallery-shell">
            <div class="gallery-inner">
                <header class="gallery-hero">
                    <p class="gallery-hero__eyebrow">
                        <i class="fas fa-images" style="font-size: 0.65rem; opacity: 0.85;" aria-hidden="true"></i>
                        Visual archive
                    </p>
                    <h1 class="gallery-hero__title">Project <span>Gallery</span></h1>
                    <p class="gallery-hero__lead">
                        Explore photo albums from SARP districts and activities. Each collection opens into its own album view.
                    </p>
                    <div class="gallery-hero__accent" aria-hidden="true"></div>
                </header>

                <div class="gallery-grid">
                    @foreach($albums as $name => $album)
                        <div>
                            <form action="{{ route('gallery.album', $album['key']) }}" method="GET">
                                <button type="submit" class="gallery-art-btn" aria-label="Open album: {{ $name }}">
                                    <article class="gallery-art-card">
                                        <div class="gallery-art-card__mat">
                                            <img
                                                class="gallery-art-card__img"
                                                src="{{ asset($album['image']) }}"
                                                alt="{{ $name }}"
                                                loading="lazy"
                                                decoding="async"
                                            >
                                            <div class="gallery-art-card__shine" aria-hidden="true"></div>
                                            <div class="gallery-art-card__vignette" aria-hidden="true"></div>
                                            <footer class="gallery-art-card__caption">
                                                <span class="gallery-art-card__label">{{ $name }}</span>
                                                <span class="gallery-art-card__hint">
                                                    Open album <i class="fas fa-arrow-right" style="font-size: 0.6rem;" aria-hidden="true"></i>
                                                </span>
                                            </footer>
                                        </div>
                                    </article>
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@include('partials.sarp_sidebar_frame_toggle')
</body>
</html>
