<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('web_plumber') }} — {{ __('Internet plumbing since the tubes were copper.') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=fira-code:400,500,600,700|instrument-sans:400,500,600&display=swap" rel="stylesheet" />
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --font-mono: 'Fira Code', 'Courier New', monospace;
            --font-sans: 'Instrument Sans', system-ui, sans-serif;
            --radius: 6px;
            --scanline: repeating-linear-gradient(0deg, transparent, transparent 2px, rgba(0,0,0,0.06) 2px, rgba(0,0,0,0.06) 4px);
        }

        [data-theme="dark"] {
            --bg: #100F0F;
            --bg-surface: #1C1B1A;
            --bg-hover: #282726;
            --text: #CECDC3;
            --text-secondary: #878580;
            --text-tertiary: #575653;
            --border: #282726;
            --green: #879A39;
            --orange: #DA702C;
            --blue: #4385BE;
            --red: #D14D41;
            --cyan: #3AA99F;
            --purple: #8B7EC8;
            --yellow: #D0A215;
            --green-glow: rgba(135, 154, 57, 0.12);
            --orange-glow: rgba(218, 112, 44, 0.08);
            --scanline: repeating-linear-gradient(0deg, transparent, transparent 2px, rgba(0,0,0,0.15) 2px, rgba(0,0,0,0.15) 4px);
        }

        [data-theme="light"] {
            --bg: #FFFCF0;
            --bg-surface: #F2F0E5;
            --bg-hover: #E6E4D9;
            --text: #100F0F;
            --text-secondary: #6F6E69;
            --text-tertiary: #B7B5AC;
            --border: #DAD8CE;
            --green: #66800B;
            --orange: #BC5210;
            --blue: #205EA6;
            --red: #AF3029;
            --cyan: #24837B;
            --purple: #5E409D;
            --yellow: #AD8301;
            --green-glow: rgba(102, 128, 11, 0.08);
            --orange-glow: rgba(188, 82, 16, 0.06);
            --scanline: repeating-linear-gradient(0deg, transparent, transparent 2px, rgba(0,0,0,0.03) 2px, rgba(0,0,0,0.03) 4px);
        }

        body {
            font-family: var(--font-mono);
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            overflow-x: hidden;
            transition: background 0.3s, color 0.3s;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: var(--scanline);
            pointer-events: none;
            z-index: 9999;
            transition: background 0.3s;
        }
        body::after {
            content: '';
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: radial-gradient(ellipse at center, transparent 55%, var(--bg) 100%);
            pointer-events: none;
            z-index: 9998;
            opacity: 0.6;
        }

        nav {
            width: 100%;
            max-width: 1040px;
            padding: 1.25rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid var(--border);
            position: relative;
            z-index: 10;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            font-size: 1rem;
            font-weight: 600;
            color: var(--green);
            text-decoration: none;
        }

        .logo-icon {
            width: 1.75rem;
            height: 1.75rem;
            border: 2px solid var(--green);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.85rem;
            color: var(--green);
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            list-style: none;
        }
        .nav-links a {
            color: var(--text-tertiary);
            text-decoration: none;
            font-size: 0.82rem;
            font-weight: 500;
            transition: color 0.2s;
        }
        .nav-links a:hover { color: var(--green); }

        .lang-switch {
            display: flex;
            gap: 0.35rem;
            margin-left: 0.5rem;
        }
        .lang-switch a {
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            padding: 0.15rem 0.35rem;
            border: 1px solid transparent;
            border-radius: 2px;
        }
        .lang-switch a:hover,
        .lang-switch a.active {
            color: var(--green);
            border-color: var(--green);
        }

        .theme-toggle {
            background: none;
            border: 1px solid var(--border);
            border-radius: 4px;
            padding: 0.3rem 0.5rem;
            color: var(--text-tertiary);
            cursor: pointer;
            font-family: var(--font-mono);
            font-size: 0.75rem;
            transition: all 0.2s;
        }
        .theme-toggle:hover {
            color: var(--green);
            border-color: var(--green);
        }

        main {
            flex: 1;
            width: 100%;
            max-width: 1040px;
            padding: 2rem 2rem 3rem;
            position: relative;
            z-index: 1;
        }

        .hero {
            padding: 2rem 0 3rem;
            border-bottom: 1px solid var(--border);
        }

        .hero-terminal {
            background: var(--bg-surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
            margin-bottom: 2rem;
        }

        .hero-terminal-bar {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.6rem 1rem;
            background: var(--bg-hover);
            border-bottom: 1px solid var(--border);
            font-size: 0.72rem;
            color: var(--text-tertiary);
        }
        .hero-terminal-bar .dot {
            width: 8px; height: 8px; border-radius: 50%;
        }
        .hero-terminal-bar .dot-r { background: var(--red); }
        .hero-terminal-bar .dot-y { background: var(--yellow); }
        .hero-terminal-bar .dot-g { background: var(--green); }

        .hero-terminal-body {
            padding: 1.25rem 1.5rem;
            min-height: 8rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .motd-line {
            display: flex;
            gap: 0.5rem;
            font-size: 0.85rem;
            color: var(--text-tertiary);
            margin-bottom: 0.5rem;
        }
        .motd-line .prompt { color: var(--green); flex-shrink: 0; }

        .motd-slide {
            display: none;
            flex-direction: column;
            gap: 0.35rem;
        }
        .motd-slide.active { display: flex; }

        .motd-slide .slogan {
            font-size: 1.1rem;
            line-height: 1.5;
            color: var(--text);
            font-family: var(--font-mono);
            border-left: 2px solid var(--orange);
            padding-left: 1rem;
            margin-top: 0.25rem;
        }
        .motd-slide .slogan-strong {
            color: var(--orange);
        }
        .motd-slide .slogan-sub {
            font-size: 0.82rem;
            color: var(--text-tertiary);
            border-left: 2px solid var(--border);
            padding-left: 1rem;
            margin-top: 0.15rem;
        }

        .motd-nav {
            display: flex;
            gap: 0.5rem;
            margin-top: 1rem;
        }
        .motd-nav button {
            background: none;
            border: 1px solid var(--border);
            border-radius: 3px;
            padding: 0.2rem 0.5rem;
            color: var(--text-tertiary);
            cursor: pointer;
            font-family: var(--font-mono);
            font-size: 0.72rem;
            transition: all 0.2s;
        }
        .motd-nav button:hover {
            color: var(--orange);
            border-color: var(--orange);
        }
        .motd-dots {
            display: flex;
            gap: 0.35rem;
            align-items: center;
            margin-left: auto;
        }
        .motd-dot {
            width: 6px; height: 6px;
            border-radius: 50%;
            background: var(--border);
            cursor: pointer;
            transition: background 0.2s;
        }
        .motd-dot.active { background: var(--orange); }

        .hero-tagline {
            font-size: 1.1rem;
            color: var(--text-secondary);
            line-height: 1.6;
            max-width: 640px;
        }
        .hero-tagline strong { color: var(--green); font-weight: 600; }

        .section-header {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin: 2.5rem 0 1.5rem;
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--green);
        }
        .section-header .prefix {
            font-weight: 400;
            color: var(--text-tertiary);
        }

        .section-header-2 {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin: 2.5rem 0 1.5rem;
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--orange);
        }
        .section-header-2 .prefix { color: var(--text-tertiary); font-weight: 400; }

        .section-header-3 {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin: 2.5rem 0 1.5rem;
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--blue);
        }
        .section-header-3 .prefix { color: var(--text-tertiary); font-weight: 400; }

        .grid-3 {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.25rem;
        }
        .grid-2 {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.25rem;
        }
        @media (max-width: 768px) {
            .grid-3, .grid-2 { grid-template-columns: 1fr; }
            nav { flex-direction: column; gap: 0.75rem; }
            .nav-links { flex-wrap: wrap; justify-content: center; }
            main { padding: 1.5rem 1rem 2rem; }
        }

        .card {
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 1.5rem;
            background: var(--bg-surface);
            transition: border-color 0.25s, box-shadow 0.25s;
        }
        .card:hover {
            border-color: var(--green);
            box-shadow: 0 0 12px var(--green-glow);
        }
        .card h4 {
            color: var(--green);
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        .card p {
            font-size: 0.82rem;
            line-height: 1.6;
            color: var(--text-secondary);
        }

        .pain-card {
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 1.5rem;
            background: var(--bg-surface);
            transition: border-color 0.25s;
        }
        .pain-card:hover { border-color: var(--red); }
        .pain-card .icon { font-size: 1.5rem; margin-bottom: 0.5rem; }
        .pain-card h4 {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--red);
            margin-bottom: 0.5rem;
        }
        .pain-card p {
            font-size: 0.82rem;
            line-height: 1.6;
            color: var(--text-secondary);
        }

        .quote-box {
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 2rem;
            margin: 2.5rem 0;
            text-align: center;
            background: var(--bg-surface);
            position: relative;
        }
        .quote-box::before {
            content: '// trust.cfg';
            position: absolute;
            top: -0.6rem;
            left: 1.5rem;
            background: var(--bg);
            padding: 0 0.6rem;
            font-size: 0.72rem;
            color: var(--text-tertiary);
            font-weight: 500;
        }
        .quote-box blockquote {
            font-size: 0.95rem;
            line-height: 1.7;
            color: var(--text);
            font-style: italic;
            margin-bottom: 0.75rem;
        }
        .quote-box cite {
            font-size: 0.8rem;
            color: var(--text-tertiary);
            font-style: normal;
        }
        .quote-box cite::before { content: '-- '; color: var(--orange); }

        .fortune-box {
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 1.5rem;
            margin: 2rem 0;
            background: var(--bg-surface);
            display: flex;
            align-items: center;
            gap: 1rem;
            cursor: pointer;
            transition: border-color 0.25s;
            user-select: none;
        }
        .fortune-box:hover { border-color: var(--yellow); }
        .fortune-box .prompt { color: var(--green); font-size: 0.85rem; flex-shrink: 0; }
        .fortune-box .fortune-text {
            font-size: 0.85rem;
            color: var(--text-secondary);
            line-height: 1.5;
            flex: 1;
        }
        .fortune-box .fortune-hint {
            font-size: 0.72rem;
            color: var(--text-tertiary);
            flex-shrink: 0;
        }

        .cta-section {
            text-align: center;
            padding: 3rem 0;
            border-top: 1px solid var(--border);
            margin-top: 2rem;
        }
        .cta-section .prompt {
            color: var(--green);
            font-size: 1.1rem;
        }
        .cta-section h2 {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text);
            margin: 0.75rem 0;
        }
        .cta-section p {
            color: var(--text-secondary);
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
        }
        .cta-link {
            display: inline-block;
            border: 1px solid var(--green);
            border-radius: var(--radius);
            padding: 0.75rem 2rem;
            color: var(--green);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.25s;
        }
        .cta-link:hover {
            background: var(--green);
            color: var(--bg);
        }

        footer {
            width: 100%;
            max-width: 1040px;
            padding: 1.5rem 2rem;
            border-top: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.75rem;
            color: var(--text-tertiary);
            position: relative;
            z-index: 1;
        }
        footer a {
            color: var(--text-tertiary);
            text-decoration: none;
            transition: color 0.2s;
        }
        footer a:hover { color: var(--green); }

        .blink { animation: blink 1.2s step-end infinite; }
        @keyframes blink { 0%,100%{opacity:1} 50%{opacity:0} }

        @keyframes type-in {
            from { max-width: 0; }
            to { max-width: 100%; }
        }
        .type-line {
            overflow: hidden;
            white-space: nowrap;
            animation: type-in 1.5s steps(60, end) forwards;
            display: inline-block;
        }

        .stack-list {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
        }
        @media (max-width: 768px) { .stack-list { grid-template-columns: 1fr; } }
        .stack-item {
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 1.25rem;
            text-align: center;
            background: var(--bg-surface);
            transition: border-color 0.25s;
        }
        .stack-item:hover { border-color: var(--cyan); }
        .stack-item .name {
            font-size: 1rem;
            font-weight: 600;
            color: var(--cyan);
            margin-bottom: 0.4rem;
        }
        .stack-item .desc {
            font-size: 0.78rem;
            color: var(--text-secondary);
            line-height: 1.5;
        }

        .tag {
            display: inline-block;
            padding: 0.15rem 0.5rem;
            border-radius: 3px;
            font-size: 0.7rem;
            font-weight: 500;
            background: var(--bg-hover);
            color: var(--text-tertiary);
            margin-right: 0.35rem;
            margin-bottom: 0.35rem;
        }
        .tag-green { border: 1px solid var(--green); color: var(--green); background: transparent; }
        .tag-orange { border: 1px solid var(--orange); color: var(--orange); background: transparent; }

        .motd-slide-enter {
            animation: fade-slide-in 0.4s ease-out;
        }
        @keyframes fade-slide-in {
            from { opacity: 0; transform: translateY(6px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <nav>
        <a href="{{ route('home') }}" class="logo">
            <span class="logo-icon">/</span>
            <span>{{ __('web_plumber') }}</span>
        </a>

        <ul class="nav-links">
            <li><a href="#problem">{{ __('Problem') }}</a></li>
            <li><a href="#services">{{ __('Services') }}</a></li>
            <li><a href="#stack">{{ __('Stack') }}</a></li>
            <li><a href="#contact">{{ __('Contact') }}</a></li>
            <li class="lang-switch">
                <a href="{{ route('lang.switch', 'pl') }}" class="{{ app()->getLocale() === 'pl' ? 'active' : '' }}">pl</a>
                <a href="{{ route('lang.switch', 'en') }}" class="{{ app()->getLocale() === 'en' ? 'active' : '' }}">en</a>
                <a href="{{ route('lang.switch', 'de') }}" class="{{ app()->getLocale() === 'de' ? 'active' : '' }}">de</a>
            </li>
            <li><button class="theme-toggle" onclick="toggleTheme()">~$ theme</button></li>
        </ul>
    </nav>

    <main>
        <section class="hero">
            <div class="hero-terminal">
                <div class="hero-terminal-bar">
                    <span class="dot dot-r"></span>
                    <span class="dot dot-y"></span>
                    <span class="dot dot-g"></span>
                    <span style="margin-left:0.5rem">web_plumber@motd: ~</span>
                </div>
                <div class="hero-terminal-body">
                    <div class="motd-line">
                        <span class="prompt">$</span>
                        <span>cat /etc/web_plumber/motd</span>
                        <span class="blink">|</span>
                    </div>

                    @php
                        $slides = [
                            [
                                'slogan' => __('Twój stack nie jest stary.') . ' <span class="slogan-strong">' . __('Jest sprawdzony.') . '</span>',
                                'sub' => __('Nie przepisujemy. Ulepszamy.'),
                            ],
                            [
                                'slogan' => __('Mówili że trzeba przepisać od zera.') . ' <span class="slogan-strong">' . __('A wyszło jak zwykle.') . '</span>',
                                'sub' => __('Zamiast gonić za nowym frameworkiem, napraw to co już masz.'),
                            ],
                            [
                                'slogan' => __('Nie potrzebujesz Kafka.') . ' <span class="slogan-strong">' . __('Potrzebujesz kogoś kto ogarnia PostgreSQL.') . '</span>',
                                'sub' => __('Nie dokładaj złożoności. Użyj tego co działa.'),
                            ],
                            [
                                'slogan' => __('ORM jest dla ludzi którzy nie znają SQL.') . ' <span class="slogan-strong">' . __('My znamy.') . '</span>',
                                'sub' => __('Dbamy o wydajność na każdym poziomie.'),
                            ],
                            [
                                'slogan' => __('Cloud?') . ' <span class="slogan-strong">' . __('Mamy bare metal. I działa.') . '</span>',
                                'sub' => __('Nie każdy problem wymaga chmury.'),
                            ],
                            [
                                'slogan' => __('Masz 40 lat i piszesz w PHP?') . ' <span class="slogan-strong">' . __('My też. I zarabiamy na tym.') . '</span>',
                                'sub' => __('Doświadczenie nie bierze się z świeżego frameworka.'),
                            ],
                            [
                                'slogan' => __('Nie wierzymy w hype.') . ' <span class="slogan-strong">' . __('Wierzymy w działający kod.') . '</span>',
                                'sub' => __('Solidne fundamenty, przewidywalne koszty.'),
                            ],
                            [
                                'slogan' => __('Mikroserwisy?') . ' <span class="slogan-strong">' . __('A próbowałeś najpierw napisać porządny monolit?') . '</span>',
                                'sub' => __('Monolit to nie brzydkie słowo.'),
                            ],
                        ];
                        $current = 0;
                    @endphp

                    @foreach($slides as $i => $slide)
                    <div class="motd-slide {{ $i === 0 ? 'active motd-slide-enter' : '' }}" data-index="{{ $i }}">
                        <div class="slogan">{!! $slide['slogan'] !!}</div>
                        <div class="slogan-sub">{{ $slide['sub'] }}</div>
                    </div>
                    @endforeach

                    <div class="motd-nav">
                        <button onclick="prevSlide()">&#8592; prev</button>
                        <button onclick="nextSlide()">next &#8594;</button>
                        <div class="motd-dots">
                            @foreach($slides as $i => $slide)
                            <span class="motd-dot {{ $i === 0 ? 'active' : '' }}" onclick="goToSlide({{ $i }})"></span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="hero-tagline">
                {{ __('Internet plumbing since the tubes were copper.') }}<br>
                <strong>{{ __('We fix pipes, not feelings.') }}</strong>
            </div>
        </section>

        <section id="problem">
            <div class="section-header"><span class="prefix">$</span> cat problem</div>

            <div class="grid-3">
                <div class="pain-card">
                    <div class="icon">!</div>
                    <h4>{{ __('Mówią że trzeba przepisać wszystko') }}</h4>
                    <p>{{ __('Słyszysz to od każdego "konsultanta". My nie przepisujemy — ulepszamy. Twój kod działa, tylko wymaga opieki.') }}</p>
                </div>
                <div class="pain-card">
                    <div class="icon">!</div>
                    <h4>{{ __('Nie możesz znaleźć specjalisty') }}</h4>
                    <p>{{ __('Wszyscy gonią za nowym stackiem. Kto ogarnie Twój 10-letni monolit? Ktoś kto go szanuje.') }}</p>
                </div>
                <div class="pain-card">
                    <div class="icon">!</div>
                    <h4>{{ __('Masz wrażenie że toniesz w długu technicznym') }}</h4>
                    <p>{{ __('Ale nie stać Cię na miesięczny przepis wszystkiego. My robimy to w zwinnych kawałkach.') }}</p>
                </div>
            </div>
        </section>

        <section id="services">
            <div class="section-header-2"><span class="prefix">&gt;</span> {{ __('Services') }}</div>

            <div class="grid-3">
                <div class="card">
                    <h4>&#123; &#125; {{ __('Audyt') }}</h4>
                    <p>{{ __('Prześwietlimy Twój kod, bazę, infrastrukturę. Powiemy co jest naprawdę złe, a co tylko wygląda.') }}</p>
                </div>
                <div class="card">
                    <h4>&#60;&#47;&#62; {{ __('Legacy support') }}</h4>
                    <p>{{ __('PHP 5.6? Symfony 2? Django 1.11? Ogarniemy. Nie oceniamy. Naprawiamy.') }}</p>
                </div>
                <div class="card">
                    <h4>&#91; &#93; {{ __('Modernizacja') }}</h4>
                    <p>{{ __('Bez przepisywania od zera. Podbijamy wersje, dodajemy testy, poprawiamy wydajność — krok po kroku.') }}</p>
                </div>
                <div class="card">
                    <h4>&#9135; {{ __('Performance') }}</h4>
                    <p>{{ __('Zanim kupisz większy serwer — pokażemy Ci jak wycisnąć 2x więcej z tego co masz.') }}</p>
                </div>
                <div class="card">
                    <h4>&#9781; {{ __('Bezpieczeństwo') }}</h4>
                    <p>{{ __('Zabezpieczymy legacy aplikację. Nie każdy błąd wymaga przepisania.') }}</p>
                </div>
                <div class="card">
                    <h4>&#9776; {{ __('DevOps dla starych systemów') }}</h4>
                    <p>{{ __('CI/CD, automatyzacja, monitoring — nawet na bare metalu.') }}</p>
                </div>
            </div>
        </section>

        <section id="stack">
            <div class="section-header-3"><span class="prefix">##</span> {{ __('Stack') }}</div>

            <div class="stack-list">
                <div class="stack-item">
                    <div class="name">PHP</div>
                    <div class="desc">{{ __('Since 5.6 to 8.3. Laravel, Symfony, a nawet żaden framework.') }}</div>
                    <div style="margin-top:0.5rem">
                        <span class="tag tag-green">Laravel</span>
                        <span class="tag tag-orange">Symfony</span>
                        <span class="tag">Drupal</span>
                        <span class="tag">WordPress</span>
                    </div>
                </div>
                <div class="stack-item">
                    <div class="name">Python</div>
                    <div class="desc">{{ __('Django, Flask, skrypty — robi się.') }}</div>
                    <div style="margin-top:0.5rem">
                        <span class="tag tag-green">Django</span>
                        <span class="tag tag-orange">Flask</span>
                        <span class="tag">FastAPI</span>
                    </div>
                </div>
                <div class="stack-item">
                    <div class="name">PostgreSQL</div>
                    <div class="desc">{{ __('Bo prawdziwa baza nie każe sobie npm install.') }}</div>
                    <div style="margin-top:0.5rem">
                        <span class="tag tag-green">SQL</span>
                        <span class="tag tag-orange">PL/pgSQL</span>
                        <span class="tag">Admin</span>
                    </div>
                </div>
            </div>
        </section>

        <div class="quote-box">
            <blockquote>{{ $quote['text'] }}</blockquote>
            <cite>{{ $quote['author'] }}</cite>
        </div>

        <div class="fortune-box" onclick="newFortune()" id="fortuneBox">
            <span class="prompt">$</span>
            <span class="fortune-text" id="fortuneText">{{ __('fortune — losowa mądrość') }}</span>
            <span class="fortune-hint">[ kliknij ]</span>
        </div>

        <section id="contact" class="cta-section">
            <div class="prompt">$ {{ __('Gadajmy. Albo napisz.') }}</div>
            <h2>{{ __('Masz projekt? Opowiedz nam o nim.') }}</h2>
            <p>{{ __('Bez zobowiązań, bez sprzedaży. Pogadamy o kodzie.') }}</p>
            <a href="mailto:hello@web-plumber.dev" class="cta-link">hello@web-plumber.dev</a>
        </section>
    </main>

    <footer>
        <div>
            <span>&copy; {{ date('Y') }} </span>
            <a href="{{ route('home') }}">{{ __('web_plumber') }}</a>
            <span> // {{ __('GNU Terry Pratchett') }}</span>
        </div>
        <div>
            <span>{{ __('Monty Python approved') }}</span>
            <span> // </span>
            <a href="https://github.com/guttenbergovitz/web_plumber" target="_blank">git</a>
        </div>
    </footer>

    <script>
        const totalSlides = {{ count($slides) }};
        let currentSlide = 0;
        let autoTimer;

        function showSlide(idx) {
            document.querySelectorAll('.motd-slide').forEach(el => {
                el.classList.remove('active', 'motd-slide-enter');
            });
            document.querySelectorAll('.motd-dot').forEach(el => el.classList.remove('active'));
            const slide = document.querySelector(`.motd-slide[data-index="${idx}"]`);
            const dot = document.querySelectorAll('.motd-dot')[idx];
            if (slide) { slide.classList.add('active', 'motd-slide-enter'); }
            if (dot) dot.classList.add('active');
            currentSlide = idx;
        }

        function nextSlide() { showSlide((currentSlide + 1) % totalSlides); resetAuto(); }
        function prevSlide() { showSlide((currentSlide - 1 + totalSlides) % totalSlides); resetAuto(); }
        function goToSlide(idx) { showSlide(idx); resetAuto(); }

        function resetAuto() {
            clearInterval(autoTimer);
            autoTimer = setInterval(() => nextSlide(), 7000);
        }
        resetAuto();

        const fortunes = [
            @foreach($fortunes ?? [] as $f)
            { text: {{ json_encode($f['text']) }}, author: {{ json_encode($f['author']) }} },
            @endforeach
        ];
        if (fortunes.length === 0) {
            fortunes.push(
                { text: "{{ __('The universe is under no obligation to make sense to you.') }}", author: "Pratchett" },
                { text: "{{ __('A common mistake that people make when trying to design something completely foolproof is to underestimate the ingenuity of complete fools.') }}", author: "Adams" },
                { text: "{{ __('It\'s not a bug, it\'s an undocumented feature.') }}", author: "{{ __('Anonymous') }}" },
                { text: "{{ __('There are only two hard things in computer science: cache invalidation, naming things, and off-by-one errors.') }}", author: "{{ __('Anonymous') }}" },
                { text: "{{ __('The answer is 42.') }}", author: "Deep Thought" },
                { text: "{{ __('We don\'t make mistakes, we have happy little accidents.') }}", author: "Ross" },
                { text: "{{ __('Let\'s not go to Camelot. It is a silly place.') }}", author: "Monty Python" },
                { text: "{{ __('I think the problem, to be quite honest with you, is that you\'ve never actually known what the question is.') }}", author: "Deep Thought" },
            );
        }

        function newFortune() {
            const f = fortunes[Math.floor(Math.random() * fortunes.length)];
            document.getElementById('fortuneText').textContent = f.text + ' — ' + f.author;
        }
        newFortune();

        function toggleTheme() {
            const html = document.documentElement;
            const current = html.getAttribute('data-theme');
            html.setAttribute('data-theme', current === 'dark' ? 'light' : 'dark');
        }
    </script>
</body>
</html>
