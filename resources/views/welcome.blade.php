<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('web_plumber') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=fira-code:400,500,600,700|instrument-sans:400,500,600,700&display=swap" rel="stylesheet" />
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --crt-bg: #0a0e0a;
            --crt-text: #c8e6c8;
            --crt-green: #4ade80;
            --crt-dim: #2d5a2d;
            --crt-pipe: #f59e0b;
            --crt-highlight: #6ee7b7;
            --crt-border: #1a3a1a;
            --crt-glow: rgba(74, 222, 128, 0.15);
            --font-mono: 'Fira Code', 'Courier New', monospace;
            --font-sans: 'Instrument Sans', system-ui, sans-serif;
        }

        body {
            font-family: var(--font-mono);
            background: var(--crt-bg);
            color: var(--crt-text);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: repeating-linear-gradient(
                0deg,
                transparent,
                transparent 2px,
                rgba(0, 0, 0, 0.15) 2px,
                rgba(0, 0, 0, 0.15) 4px
            );
            pointer-events: none;
            z-index: 9999;
        }

        body::after {
            content: '';
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: radial-gradient(ellipse at center, transparent 50%, rgba(0, 0, 0, 0.4) 100%);
            pointer-events: none;
            z-index: 9998;
        }

        nav {
            width: 100%;
            max-width: 960px;
            padding: 1.5rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid var(--crt-border);
            position: relative;
            z-index: 1;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--crt-green);
            text-decoration: none;
            letter-spacing: -0.02em;
        }

        .logo-icon {
            width: 2rem;
            height: 2rem;
            border: 2px solid var(--crt-green);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            list-style: none;
        }

        .nav-links a {
            color: var(--crt-dim);
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 500;
            transition: color 0.2s;
        }

        .nav-links a:hover { color: var(--crt-green); }

        .lang-switch {
            display: flex;
            gap: 0.5rem;
        }

        .lang-switch a {
            color: var(--crt-dim);
            text-decoration: none;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            padding: 0.2rem 0.4rem;
            border: 1px solid transparent;
            border-radius: 2px;
            transition: all 0.2s;
        }

        .lang-switch a:hover,
        .lang-switch a.active {
            color: var(--crt-green);
            border-color: var(--crt-green);
        }

        main {
            flex: 1;
            width: 100%;
            max-width: 960px;
            padding: 3rem 2rem;
            position: relative;
            z-index: 1;
        }

        .hero {
            text-align: center;
            padding: 3rem 0 4rem;
            border-bottom: 1px solid var(--crt-border);
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: 700;
            color: var(--crt-green);
            margin-bottom: 0.5rem;
            text-shadow: 0 0 20px var(--crt-glow);
            letter-spacing: -0.03em;
        }

        .hero .pipe {
            font-size: 1.1rem;
            color: var(--crt-pipe);
            margin-bottom: 0.5rem;
        }

        .hero .sub {
            font-size: 0.9rem;
            color: var(--crt-dim);
        }

        .ascii-art {
            font-size: 0.6rem;
            line-height: 1.1;
            color: var(--crt-dim);
            white-space: pre;
            text-align: center;
            margin: 2rem 0;
            user-select: none;
        }

        .ascii-art span { color: var(--crt-pipe); }

        .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
            margin: 3rem 0;
        }

        @media (max-width: 768px) {
            .grid { grid-template-columns: 1fr; }
            .hero h1 { font-size: 2rem; }
            nav { flex-direction: column; gap: 1rem; }
            .nav-links { flex-wrap: wrap; justify-content: center; }
        }

        .card {
            border: 1px solid var(--crt-border);
            border-radius: 4px;
            padding: 1.5rem;
            transition: border-color 0.3s, box-shadow 0.3s;
            background: rgba(10, 14, 10, 0.6);
        }

        .card:hover {
            border-color: var(--crt-green);
            box-shadow: 0 0 15px var(--crt-glow);
        }

        .card h3 {
            color: var(--crt-green);
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
        }

        .card p {
            font-size: 0.82rem;
            line-height: 1.6;
            color: #8aaa8a;
        }

        .quote-box {
            border: 1px solid var(--crt-pipe);
            border-radius: 4px;
            padding: 2rem;
            margin: 3rem 0;
            text-align: center;
            background: rgba(245, 158, 11, 0.04);
            position: relative;
        }

        .quote-box::before {
            content: '>';
            position: absolute;
            top: -0.6rem;
            left: 1rem;
            background: var(--crt-bg);
            padding: 0 0.5rem;
            color: var(--crt-pipe);
            font-weight: 700;
        }

        .quote-box blockquote {
            font-size: 0.95rem;
            line-height: 1.7;
            color: var(--crt-highlight);
            font-style: italic;
            margin-bottom: 0.75rem;
        }

        .quote-box cite {
            font-size: 0.8rem;
            color: var(--crt-dim);
            font-style: normal;
        }

        .quote-box cite::before {
            content: '-- ';
            color: var(--crt-pipe);
        }

        .stack-list {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
            justify-content: center;
            margin: 2rem 0;
        }

        .stack-item {
            border: 1px solid var(--crt-border);
            border-radius: 4px;
            padding: 1rem 1.5rem;
            text-align: center;
            flex: 1;
            min-width: 180px;
            transition: all 0.3s;
        }

        .stack-item:hover {
            border-color: var(--crt-green);
        }

        .stack-item .name {
            font-size: 1rem;
            font-weight: 600;
            color: var(--crt-green);
            margin-bottom: 0.4rem;
        }

        .stack-item .desc {
            font-size: 0.78rem;
            color: #6a8a6a;
            line-height: 1.5;
        }

        footer {
            width: 100%;
            max-width: 960px;
            padding: 2rem;
            border-top: 1px solid var(--crt-border);
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.75rem;
            color: var(--crt-dim);
            position: relative;
            z-index: 1;
        }

        footer a {
            color: var(--crt-dim);
            text-decoration: none;
            transition: color 0.2s;
        }

        footer a:hover { color: var(--crt-green); }

        .blink {
            animation: blink 1.2s step-end infinite;
        }

        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0; }
        }

        .terminal-line {
            display: flex;
            gap: 0.5rem;
            font-size: 0.82rem;
            color: var(--crt-dim);
            margin-bottom: 0.3rem;
        }

        .terminal-line .prompt {
            color: var(--crt-green);
            flex-shrink: 0;
        }

        .glow {
            animation: glow 3s ease-in-out infinite alternate;
        }

        @keyframes glow {
            from { text-shadow: 0 0 10px var(--crt-glow), 0 0 20px var(--crt-glow); }
            to { text-shadow: 0 0 20px var(--crt-glow), 0 0 40px var(--crt-glow), 0 0 60px var(--crt-glow); }
        }

        @keyframes scanline {
            0% { transform: translateY(-100%); }
            100% { transform: translateY(100vh); }
        }

        .section-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--crt-green);
            margin: 2rem 0 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .section-title::before {
            content: '##';
            color: var(--crt-dim);
            font-weight: 400;
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
            <li><a href="#about">{{ __('About') }}</a></li>
            <li><a href="#services">{{ __('Services') }}</a></li>
            <li><a href="#stack">{{ __('Our stack') }}</a></li>
            <li class="lang-switch">
                <a href="{{ route('lang.switch', 'pl') }}" class="{{ app()->getLocale() === 'pl' ? 'active' : '' }}">pl</a>
                <a href="{{ route('lang.switch', 'en') }}" class="{{ app()->getLocale() === 'en' ? 'active' : '' }}">en</a>
                <a href="{{ route('lang.switch', 'de') }}" class="{{ app()->getLocale() === 'de' ? 'active' : '' }}">de</a>
            </li>
        </ul>
    </nav>

    <main>
        <section class="hero">
            <div class="terminal-line">
                <span class="prompt">$</span>
                <span>cat /etc/web_plumber/motd</span>
                <span class="blink">|</span>
            </div>
            <h1 class="glow">{{ __('Welcome to web_plumber') }}</h1>
            <div class="pipe">{{ __('We fix pipes, not feelings.') }}</div>
            <div class="sub">{{ __('Internet plumbing since the tubes were copper.') }}</div>

            <div class="ascii-art">
               _____ _           _   _                         
              |  __ \         _| |_| |_   _ _ __  _ __         
              | |__) |_ _  __|_   _| | | | | '_ \| '_ \        
              |  ___/ _` |/ _` | | | | |_| | |_) | |_) |       
              |_|  | (_| | (_| | |_| |\__,_| .__/| .__/        
                    \__,_|\__, |           | |   | |           
                           __/ |           |_|   |_|           
                          |___/                                 
                 _   _ _   _ _       _                        
                | | | | |_(_) |__   | |__  _ __ __ _ ___ _   _ 
                | |_| | __| | '_ \  | '_ \| '__/ _` / __| | | |
                |  _  | |_| | |_) | | |_) | | | (_| \__ \ |_| |
                |_| |_|\__|_|_.__/  |_.__/|_|  \__,_|___/\__,_|
                                                            
            </div>
        </section>

        <section id="about">
            <div class="section-title">{{ __('Who we are') }}</div>
            <div class="card" style="margin-bottom: 1.5rem;">
                <p>
                    {{ __('We are a collective of senior devs who believe in') }}
                    <strong style="color: var(--crt-green);">{{ __('solid foundations') }}</strong>.
                    {{ __('Instead of chasing every new framework we focus on') }}
                    <strong style="color: var(--crt-highlight);">{{ __('what actually works') }}</strong>.
                </p>
                <p style="margin-top: 0.75rem; color: var(--crt-pipe);">
                    {{ __('PHP, Python, PostgreSQL — the unholy trinity we call home.') }}
                </p>
            </div>
        </section>

        <section id="services">
            <div class="section-title">{{ __('What we do') }}</div>
            <div class="grid">
                <div class="card">
                    <h3>&#123; &#125;</h3>
                    <p>{{ __('We build monolithic applications that don\'t break when the wind changes.') }}</p>
                </div>
                <div class="card">
                    <h3>&#60;&#47;&#62;</h3>
                    <p>{{ __('We wire databases directly, because ORMs are for people who don\'t know SQL.') }}</p>
                </div>
                <div class="card">
                    <h3>&#91; &#93;</h3>
                    <p>{{ __('We deploy on bare metal because clouds are for weather, not production.') }}</p>
                </div>
            </div>
        </section>

        <section id="stack">
            <div class="section-title">{{ __('Our stack') }}</div>
            <div class="stack-list">
                <div class="stack-item">
                    <div class="name">&gt; PHP 8</div>
                    <div class="desc">{{ __('Because sometimes the old ways are the best ways.') }}</div>
                </div>
                <div class="stack-item">
                    <div class="name">&gt; Python</div>
                    <div class="desc">{{ __('For when you need a scripting language that does what it says on the tin.') }}</div>
                </div>
                <div class="stack-item">
                    <div class="name">&gt; PostgreSQL</div>
                    <div class="desc">{{ __('The only database that never once asked us to \'npm install\'.') }}</div>
                </div>
            </div>
        </section>

        <div class="quote-box">
            <blockquote>{{ $quote['text'] }}</blockquote>
            <cite>{{ $quote['author'] }}</cite>
        </div>

        <div class="terminal-line" style="justify-content: center; margin: 2rem 0;">
            <span class="prompt">$</span>
            <span>{{ __('Now go forth and build something that lasts.') }}</span>
            <span class="blink">_</span>
        </div>
    </main>

    <footer>
        <div>
            <span>&copy; {{ date('Y') }} </span>
            <a href="{{ route('home') }}">{{ __('web_plumber') }}</a>
            <span> // {{ __('Bootloader') }} v1.0</span>
        </div>
        <div>
            <a href="https://github.com/guttenbergovitz/web_plumber" target="_blank">git</a>
            <span> // </span>
            <span>{{ app()->getLocale() === 'pl' ? 'Zatwierdzone przez' : (app()->getLocale() === 'de' ? 'Genehmigt von' : 'Approved by') }} Monty Python</span>
        </div>
    </footer>
</body>
</html>
