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
            --fs-hero: 2.5rem;
            --fs-h2: 1.35rem;
            --fs-h3: 1.05rem;
            --fs-body: 0.92rem;
            --fs-small: 0.82rem;
            --fs-meta: 0.73rem;
            --lh-tight: 1.25;
            --lh-body: 1.65;
            --lh-loose: 1.8;
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
        }

        body {
            font-family: var(--font-mono);
            background: var(--bg);
            color: var(--text);
            font-size: var(--fs-body);
            line-height: var(--lh-body);
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
            background: repeating-linear-gradient(0deg, transparent, transparent 2px, rgba(0,0,0,0.08) 2px, rgba(0,0,0,0.08) 4px);
            pointer-events: none;
            z-index: 9999;
        }
        body::after {
            content: '';
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: radial-gradient(ellipse at center, transparent 55%, var(--bg) 100%);
            pointer-events: none;
            z-index: 9998;
            opacity: 0.5;
        }

        h1 { font-size: var(--fs-hero); line-height: var(--lh-tight); font-weight: 700; }
        h2 { font-size: var(--fs-h2); line-height: var(--lh-tight); font-weight: 600; }
        h3 { font-size: var(--fs-h3); line-height: var(--lh-tight); font-weight: 600; }

        nav {
            width: 100%;
            max-width: 1100px;
            padding: 1.1rem 2rem;
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
            font-size: var(--fs-body);
            font-weight: 600;
            color: var(--green);
            text-decoration: none;
        }
        .logo-icon {
            width: 1.7rem;
            height: 1.7rem;
            border: 2px solid var(--green);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 1.25rem;
            list-style: none;
        }
        .nav-links a {
            color: var(--text-tertiary);
            text-decoration: none;
            font-size: var(--fs-meta);
            font-weight: 500;
            transition: color 0.2s;
        }
        .nav-links a:hover { color: var(--green); }

        .lang-switch { display: flex; gap: 0.3rem; margin-left: 0.5rem; }
        .lang-switch a {
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            padding: 0.15rem 0.35rem;
            border: 1px solid transparent;
            border-radius: 2px;
        }
        .lang-switch a:hover,
        .lang-switch a.active { color: var(--green); border-color: var(--green); }

        .theme-toggle {
            background: none;
            border: 1px solid var(--border);
            border-radius: 4px;
            padding: 0.25rem 0.5rem;
            color: var(--text-tertiary);
            cursor: pointer;
            font-family: var(--font-mono);
            font-size: var(--fs-meta);
            transition: all 0.2s;
        }
        .theme-toggle:hover { color: var(--green); border-color: var(--green); }

        main {
            flex: 1;
            width: 100%;
            max-width: 1100px;
            padding: 2.5rem 2rem 3rem;
            position: relative;
            z-index: 1;
        }

        .hero { padding: 1.5rem 0 2.5rem; border-bottom: 1px solid var(--border); }

        .hero-terminal {
            background: var(--bg-surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
            margin-bottom: 1.5rem;
        }

        .hero-terminal-bar {
            display: flex;
            align-items: center;
            gap: 0.45rem;
            padding: 0.5rem 1rem;
            background: var(--bg-hover);
            border-bottom: 1px solid var(--border);
            font-size: var(--fs-meta);
            color: var(--text-tertiary);
        }
        .hero-terminal-bar .dot { width: 7px; height: 7px; border-radius: 50%; }
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
            font-size: var(--fs-small);
            color: var(--text-tertiary);
            margin-bottom: 0.75rem;
        }
        .motd-line .prompt { color: var(--green); flex-shrink: 0; }

        #motd-slides-container {
            position: relative;
            min-height: 4.5rem;
        }

        .motd-slide {
            position: absolute;
            top: 0; left: 0;
            width: 100%;
            opacity: 0;
            transform: translateY(6px);
            transition: opacity 0.35s ease, transform 0.35s ease;
            pointer-events: none;
        }
        .motd-slide.active {
            opacity: 1;
            transform: translateY(0);
            pointer-events: auto;
            position: relative;
        }

        .motd-slide .slogan {
            font-size: 1rem;
            line-height: var(--lh-loose);
            color: var(--text);
            font-family: var(--font-mono);
            border-left: 2px solid var(--orange);
            padding-left: 1rem;
        }
        .motd-slide .slogan-strong { color: var(--orange); }
        .motd-slide .slogan-sub {
            font-size: var(--fs-small);
            color: var(--text-secondary);
            border-left: 2px solid var(--border);
            padding-left: 1rem;
            margin-top: 0.25rem;
            line-height: var(--lh-body);
        }

        .motd-nav {
            display: flex;
            align-items: center;
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
            font-size: var(--fs-meta);
            transition: all 0.2s;
            line-height: 1.4;
        }
        .motd-nav button:hover { color: var(--orange); border-color: var(--orange); }
        .motd-dots { display: flex; gap: 0.35rem; align-items: center; margin-left: auto; }
        .motd-dot {
            width: 6px; height: 6px; border-radius: 50%;
            background: var(--border);
            cursor: pointer;
            transition: background 0.2s;
        }
        .motd-dot.active { background: var(--orange); }

        .hero-tagline {
            font-size: var(--fs-body);
            color: var(--text-secondary);
            line-height: var(--lh-loose);
        }
        .hero-tagline strong { color: var(--green); font-weight: 600; }

        .hero-clarify {
            display: inline-block;
            margin-top: 0.5rem;
            font-size: var(--fs-small);
            color: var(--text-tertiary);
            background: var(--bg-surface);
            padding: 0.35rem 0.75rem;
            border-radius: 4px;
            border: 1px solid var(--border);
        }

        .section-header {
            display: flex;
            align-items: baseline;
            gap: 0.6rem;
            margin: 3rem 0 1.5rem;
            font-size: var(--fs-h2);
            font-weight: 600;
            color: var(--green);
            font-family: var(--font-mono);
        }
        .section-header .prefix { color: var(--text-tertiary); font-weight: 400; font-size: var(--fs-body); }

        .section-header-orange { color: var(--orange); }
        .section-header-blue { color: var(--blue); }

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
            :root {
                --fs-hero: 1.8rem;
                --fs-h2: 1.15rem;
            }
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
        .card h3 {
            color: var(--green);
            margin-bottom: 0.5rem;
        }
        .card p {
            font-size: var(--fs-small);
            line-height: var(--lh-body);
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
        .pain-card .icon { font-size: 1.2rem; margin-bottom: 0.5rem; color: var(--red); }
        .pain-card h3 {
            color: var(--red);
            margin-bottom: 0.5rem;
        }
        .pain-card p {
            font-size: var(--fs-small);
            line-height: var(--lh-body);
            color: var(--text-secondary);
        }

        .quote-box {
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 2rem;
            margin: 3rem 0 2rem;
            text-align: center;
            background: var(--bg-surface);
            position: relative;
        }
        .quote-box::before {
            content: '// trust.cfg';
            position: absolute;
            top: -0.55rem;
            left: 1.5rem;
            background: var(--bg);
            padding: 0 0.6rem;
            font-size: var(--fs-meta);
            color: var(--text-tertiary);
        }
        .quote-box blockquote {
            font-size: var(--fs-body);
            line-height: var(--lh-loose);
            color: var(--text);
            font-style: italic;
            margin-bottom: 0.75rem;
        }
        .quote-box cite {
            font-size: var(--fs-small);
            color: var(--text-tertiary);
            font-style: normal;
        }
        .quote-box cite::before { content: '-- '; color: var(--orange); }

        .fortune-box {
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 1rem 1.25rem;
            margin: 1.5rem 0;
            background: var(--bg-surface);
            display: flex;
            align-items: center;
            gap: 0.75rem;
            cursor: pointer;
            transition: border-color 0.25s;
            user-select: none;
        }
        .fortune-box:hover { border-color: var(--yellow); }
        .fortune-box .prompt { color: var(--green); font-size: var(--fs-body); flex-shrink: 0; }
        .fortune-box .fortune-text {
            font-size: var(--fs-small);
            color: var(--text-secondary);
            line-height: var(--lh-body);
            flex: 1;
        }
        .fortune-box .fortune-hint {
            font-size: var(--fs-meta);
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
            font-size: var(--fs-body);
            font-family: var(--font-mono);
        }
        .cta-section h2 {
            font-size: var(--fs-h2);
            font-weight: 600;
            color: var(--text);
            margin: 0.75rem 0;
        }
        .cta-section p {
            color: var(--text-secondary);
            font-size: var(--fs-body);
            margin-bottom: 1.5rem;
        }
        .cta-link {
            display: inline-block;
            border: 1px solid var(--green);
            border-radius: var(--radius);
            padding: 0.65rem 2rem;
            color: var(--green);
            text-decoration: none;
            font-weight: 500;
            font-family: var(--font-mono);
            transition: all 0.25s;
        }
        .cta-link:hover { background: var(--green); color: var(--bg); }

        footer {
            width: 100%;
            max-width: 1100px;
            padding: 1.25rem 2rem;
            border-top: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: var(--fs-meta);
            color: var(--text-tertiary);
            position: relative;
            z-index: 1;
        }
        footer a { color: var(--text-tertiary); text-decoration: none; transition: color 0.2s; }
        footer a:hover { color: var(--green); }

        .blink { animation: blink 1.2s step-end infinite; }
        @keyframes blink { 0%,100%{opacity:1} 50%{opacity:0} }

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
        .stack-item h3 {
            color: var(--cyan);
            margin-bottom: 0.4rem;
        }
        .stack-item p {
            font-size: var(--fs-small);
            color: var(--text-secondary);
            line-height: var(--lh-body);
        }

        .tag {
            display: inline-block;
            padding: 0.1rem 0.45rem;
            border-radius: 3px;
            font-size: 0.65rem;
            font-weight: 500;
            background: var(--bg-hover);
            color: var(--text-tertiary);
            margin: 0.15rem;
        }
        .tag-green { border: 1px solid var(--green); color: var(--green); background: transparent; }
        .tag-orange { border: 1px solid var(--orange); color: var(--orange); background: transparent; }

        .motto-clarify {
            margin: 1rem 0;
            font-family: var(--font-sans);
            font-size: var(--fs-small);
            color: var(--text-secondary);
            line-height: var(--lh-body);
            max-width: 560px;
        }
        .motto-clarify em { color: var(--text); font-style: normal; font-weight: 500; }
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

                    <div id="motd-slides-container"></div>

                    <div class="motd-nav">
                        <button id="motd-prev">&#8592; prev</button>
                        <button id="motd-next">next &#8594;</button>
                        <div id="motd-dots" class="motd-dots"></div>
                    </div>
                </div>
            </div>

            <div class="hero-tagline">
                {{ __('Internet plumbing since the tubes were copper.') }}<br>
                <strong>{{ __('We fix pipes, not feelings.') }}</strong>
            </div>

            <div class="hero-clarify">
                {{ __('Web plumbing. Really. Not water pipes.') }}
            </div>
        </section>

        <section id="problem">
            <div class="section-header"><span class="prefix">$</span> cat problem</div>

            <div class="grid-3">
                <div class="pain-card">
                    <div class="icon">!</div>
                    <h3>{{ __('Mówią że trzeba przepisać wszystko') }}</h3>
                    <p>{{ __('Słyszysz to od każdego "konsultanta". My nie przepisujemy — ulepszamy. Twój kod działa, tylko wymaga opieki.') }}</p>
                </div>
                <div class="pain-card">
                    <div class="icon">!</div>
                    <h3>{{ __('Nie możesz znaleźć specjalisty') }}</h3>
                    <p>{{ __('Wszyscy gonią za nowym stackiem. Kto ogarnie Twój 10-letni monolit? Ktoś kto go szanuje.') }}</p>
                </div>
                <div class="pain-card">
                    <div class="icon">!</div>
                    <h3>{{ __('Masz wrażenie że toniesz w długu technicznym') }}</h3>
                    <p>{{ __('Ale nie stać Cię na miesięczny przepis wszystkiego. My robimy to w zwinnych kawałkach.') }}</p>
                </div>
            </div>
        </section>

        <section id="services">
            <div class="section-header section-header-orange"><span class="prefix">&gt;</span> {{ __('Services') }}</div>

            <div class="grid-3">
                <div class="card">
                    <h3>&#123; &#125; {{ __('Audyt') }}</h3>
                    <p>{{ __('Prześwietlimy Twój kod, bazę, infrastrukturę. Powiemy co jest naprawdę złe, a co tylko wygląda.') }}</p>
                </div>
                <div class="card">
                    <h3>&#60;&#47;&#62; {{ __('Legacy support') }}</h3>
                    <p>{{ __('PHP 5.6? Symfony 2? Django 1.11? Ogarniemy. Nie oceniamy. Naprawiamy.') }}</p>
                </div>
                <div class="card">
                    <h3>&#91; &#93; {{ __('Modernizacja') }}</h3>
                    <p>{{ __('Bez przepisywania od zera. Podbijamy wersje, dodajemy testy, poprawiamy wydajność — krok po kroku.') }}</p>
                </div>
                <div class="card">
                    <h3>&#9135; {{ __('Performance') }}</h3>
                    <p>{{ __('Zanim kupisz większy serwer — pokażemy Ci jak wycisnąć 2x więcej z tego co masz.') }}</p>
                </div>
                <div class="card">
                    <h3>&#9781; {{ __('Bezpieczeństwo') }}</h3>
                    <p>{{ __('Zabezpieczymy legacy aplikację. Nie każdy błąd wymaga przepisania.') }}</p>
                </div>
                <div class="card">
                    <h3>&#9776; {{ __('DevOps dla starych systemów') }}</h3>
                    <p>{{ __('CI/CD, automatyzacja, monitoring — nawet na bare metalu.') }}</p>
                </div>
            </div>
        </section>

        <section id="stack">
            <div class="section-header section-header-blue"><span class="prefix">##</span> {{ __('Stack') }}</div>

            <div class="stack-list">
                <div class="stack-item">
                    <h3>PHP</h3>
                    <p>{{ __('Since 5.6 to 8.3. Laravel, Symfony, a nawet żaden framework.') }}</p>
                    <div style="margin-top:0.5rem">
                        <span class="tag tag-green">Laravel</span>
                        <span class="tag tag-orange">Symfony</span>
                        <span class="tag">Drupal</span>
                        <span class="tag">WordPress</span>
                    </div>
                </div>
                <div class="stack-item">
                    <h3>Python</h3>
                    <p>{{ __('Django, Flask, skrypty — robi się.') }}</p>
                    <div style="margin-top:0.5rem">
                        <span class="tag tag-green">Django</span>
                        <span class="tag tag-orange">Flask</span>
                        <span class="tag">FastAPI</span>
                    </div>
                </div>
                <div class="stack-item">
                    <h3>PostgreSQL</h3>
                    <p>{{ __('Bo prawdziwa baza nie każe sobie npm install.') }}</p>
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

        <div class="fortune-box" id="fortuneBox">
            <span class="prompt">$</span>
            <span class="fortune-text" id="fortuneText">{{ __('fortune — losowa mądrość') }}</span>
            <span class="fortune-hint">[ {{ __('kliknij') }} ]</span>
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
    (function() {
        var slides = {!! json_encode([
            ['slogan' => __('Twój stack nie jest stary.'), 'slogan2' => __('Jest sprawdzony.'), 'sub' => __('Nie przepisujemy. Ulepszamy.')],
            ['slogan' => __('Mówili że trzeba przepisać od zera.'), 'slogan2' => __('A wyszło jak zwykle.'), 'sub' => __('Zamiast gonić za nowym frameworkiem, napraw to co już masz.')],
            ['slogan' => __('Nie potrzebujesz Kafka.'), 'slogan2' => __('Potrzebujesz kogoś kto ogarnia PostgreSQL.'), 'sub' => __('Nie dokładaj złożoności. Użyj tego co działa.')],
            ['slogan' => __('ORM jest dla ludzi którzy nie znają SQL.'), 'slogan2' => __('My znamy.'), 'sub' => __('Dbamy o wydajność na każdym poziomie.')],
            ['slogan' => __('Cloud?'), 'slogan2' => __('Mamy bare metal. I działa.'), 'sub' => __('Nie każdy problem wymaga chmury.')],
            ['slogan' => __('Masz 40 lat i piszesz w PHP?'), 'slogan2' => __('My też. I zarabiamy na tym.'), 'sub' => __('Doświadczenie nie bierze się z świeżego frameworka.')],
            ['slogan' => __('Nie wierzymy w hype.'), 'slogan2' => __('Wierzymy w działający kod.'), 'sub' => __('Solidne fundamenty, przewidywalne koszty.')],
            ['slogan' => __('Mikroserwisy?'), 'slogan2' => __('A próbowałeś najpierw napisać porządny monolit?'), 'sub' => __('Monolit to nie brzydkie słowo.')],
        ]) !!};

        var container = document.getElementById('motd-slides-container');
        var dotsContainer = document.getElementById('motd-dots');
        var current = 0;
        var timer;

        function render() {
            container.innerHTML = '';
            dotsContainer.innerHTML = '';
            slides.forEach(function(s, i) {
                var div = document.createElement('div');
                div.className = 'motd-slide' + (i === 0 ? ' active' : '');
                div.innerHTML =
                    '<div class="slogan">' + s.slogan + ' <span class="slogan-strong">' + s.slogan2 + '</span></div>' +
                    '<div class="slogan-sub">' + s.sub + '</div>';
                container.appendChild(div);

                var dot = document.createElement('span');
                dot.className = 'motd-dot' + (i === 0 ? ' active' : '');
                dot.addEventListener('click', function() { goTo(i); });
                dotsContainer.appendChild(dot);
            });
        }

        function show(idx) {
            var slides = container.querySelectorAll('.motd-slide');
            var dots = dotsContainer.querySelectorAll('.motd-dot');
            if (idx < 0) idx = slides.length - 1;
            if (idx >= slides.length) idx = 0;
            slides.forEach(function(el) { el.classList.remove('active'); });
            dots.forEach(function(el) { el.classList.remove('active'); });
            if (slides[idx]) slides[idx].classList.add('active');
            if (dots[idx]) dots[idx].classList.add('active');
            current = idx;
        }

        function next() { show(current + 1); resetTimer(); }
        function prev() { show(current - 1); resetTimer(); }
        function goTo(idx) { show(idx); resetTimer(); }

        function resetTimer() {
            clearInterval(timer);
            timer = setInterval(next, 7000);
        }

        render();
        resetTimer();

        document.getElementById('motd-prev').addEventListener('click', prev);
        document.getElementById('motd-next').addEventListener('click', next);

        var fortunes = {!! json_encode($fortunes) !!};
        var fortuneText = document.getElementById('fortuneText');
        function newFortune() {
            var f = fortunes[Math.floor(Math.random() * fortunes.length)];
            fortuneText.textContent = f.text + ' — ' + f.author;
        }
        document.getElementById('fortuneBox').addEventListener('click', newFortune);
        newFortune();
    })();

    function toggleTheme() {
        var html = document.documentElement;
        html.setAttribute('data-theme', html.getAttribute('data-theme') === 'dark' ? 'light' : 'dark');
    }
    </script>
</body>
</html>
