<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', __('web_plumber')) — {{ __('Internet plumbing since the tubes were copper.') }}</title>
    <meta name="description" content="@yield('meta_description', __('Internet plumbing since the tubes were copper.'))">
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

        [data-theme="boomer"] {
            --bg: #FFFFFF;
            --bg-surface: #F5F5F5;
            --bg-hover: #EEEEEE;
            --text: #000000;
            --text-secondary: #333333;
            --text-tertiary: #666666;
            --border: #CCCCCC;
            --green: #000000;
            --orange: #000000;
            --blue: #000000;
            --red: #000000;
            --cyan: #000000;
            --purple: #000000;
            --yellow: #000000;
            --green-glow: transparent;
            --orange-glow: transparent;
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
            opacity: 1;
            transition: opacity 0.3s;
        }
        [data-theme="boomer"] body::before {
            opacity: 0;
        }
        body::after {
            content: '';
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: radial-gradient(ellipse at center, transparent 55%, var(--bg) 100%);
            pointer-events: none;
            z-index: 9998;
            opacity: 0.5;
            transition: opacity 0.3s;
        }
        [data-theme="boomer"] body::after {
            opacity: 0;
        }

        h1 { font-size: var(--fs-hero); line-height: var(--lh-tight); font-weight: 700; }
        h2 { font-size: var(--fs-h2); line-height: var(--lh-tight); font-weight: 600; }
        h3 { font-size: var(--fs-h3); line-height: var(--lh-tight); font-weight: 600; }

        a { color: var(--blue); text-decoration: none; }
        a:hover { color: var(--green); }

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
            font-size: var(--fs-h3);
            font-weight: 700;
            color: var(--green);
            text-decoration: none;
            letter-spacing: -0.02em;
        }
        .logo:hover { color: var(--green); }
        .logo-icon {
            width: 2rem; height: 2rem;
            border: 2px solid var(--green);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
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
            text-transform: uppercase;
            letter-spacing: 0.03em;
        }
        .nav-links a:hover { color: var(--green); }
        .nav-links a.active { color: var(--green); }

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

        .page-header {
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid var(--border);
        }
        .page-header h1 {
            color: var(--green);
            margin-bottom: 0.5rem;
        }
        .page-header p {
            color: var(--text-secondary);
            font-size: var(--fs-body);
            max-width: 640px;
        }

        .page-section {
            margin-bottom: 2.5rem;
        }
        .page-section h2 {
            color: var(--green);
            margin-bottom: 0.75rem;
            font-family: var(--font-mono);
        }
        .page-section h2 .prefix { color: var(--text-tertiary); font-weight: 400; font-size: var(--fs-body); }
        .page-section p {
            color: var(--text-secondary);
            font-size: var(--fs-body);
            line-height: var(--lh-loose);
            margin-bottom: 1rem;
            max-width: 720px;
        }
        .page-section ul {
            color: var(--text-secondary);
            font-size: var(--fs-body);
            line-height: var(--lh-loose);
            padding-left: 1.5rem;
            margin-bottom: 1rem;
        }
        .page-section li { margin-bottom: 0.4rem; }

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
            padding: 1.25rem;
            background: var(--bg-surface);
            transition: border-color 0.25s, box-shadow 0.25s;
        }
        .card:hover { border-color: var(--green); box-shadow: 0 0 12px var(--green-glow); }
        .card h3 { color: var(--green); margin-bottom: 0.5rem; }
        .card p { font-size: var(--fs-small); line-height: var(--lh-body); color: var(--text-secondary); }

        .tag {
            display: inline-block;
            padding: 0.1rem 0.45rem;
            border-radius: 3px;
            font-size: 0.65rem;
            font-weight: 500;
            background: var(--bg-hover);
            color: var(--text-tertiary);
            margin: 0.15rem;
            white-space: nowrap;
        }
        .tag-green { border: 1px solid var(--green); color: var(--green); background: transparent; }
        .tag-orange { border: 1px solid var(--orange); color: var(--orange); background: transparent; }
        .tag-blue { border: 1px solid var(--blue); color: var(--blue); background: transparent; }

        .cta-section {
            text-align: center;
            padding: 3rem 0;
            border-top: 1px solid var(--border);
            margin-top: 2rem;
        }
        .cta-section .prompt { color: var(--green); font-size: var(--fs-body); font-family: var(--font-mono); }
        .cta-section h2 { font-size: var(--fs-h2); font-weight: 600; color: var(--text); margin: 0.75rem 0; }
        .cta-section p { color: var(--text-secondary); font-size: var(--fs-body); margin-bottom: 1.5rem; }
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
        footer a { color: var(--text-tertiary); }
        footer a:hover { color: var(--green); }

        .blink { animation: blink 1.2s step-end infinite; }
        @keyframes blink { 0%,100%{opacity:1} 50%{opacity:0} }

        .note-box {
            border: 1px solid var(--orange);
            border-radius: var(--radius);
            padding: 1rem 1.25rem;
            margin: 1rem 0;
            background: var(--bg-surface);
            font-size: var(--fs-small);
            color: var(--text-secondary);
            line-height: var(--lh-body);
        }
        .note-box strong { color: var(--orange); }
    </style>
    @stack('head')
</head>
<body>
    <nav>
        <a href="{{ route('home') }}" class="logo">
            <span class="logo-icon">/</span>
            <span>{{ __('web_plumber') }}</span>
        </a>

        <ul class="nav-links">
            <li><a href="{{ route('problem') }}" class="{{ request()->routeIs('problem') ? 'active' : '' }}">{{ __('Problem') }}</a></li>
            <li><a href="{{ route('services') }}" class="{{ request()->routeIs('services*') ? 'active' : '' }}">{{ __('Services') }}</a></li>
            <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">{{ __('About') }}</a></li>
            <li><a href="{{ route('ai-reality') }}" class="{{ request()->routeIs('ai-reality') ? 'active' : '' }}">{{ __('AI Reality') }}</a></li>
            @if(request()->routeIs('home'))
            <li><a href="#contact">{{ __('Contact') }}</a></li>
            @else
            <li><a href="{{ route('home') }}#contact">{{ __('Contact') }}</a></li>
            @endif
            <li class="lang-switch">
                <a href="{{ route('lang.switch', 'pl') }}" class="{{ app()->getLocale() === 'pl' ? 'active' : '' }}">pl</a>
                <a href="{{ route('lang.switch', 'en') }}" class="{{ app()->getLocale() === 'en' ? 'active' : '' }}">en</a>
                <a href="{{ route('lang.switch', 'de') }}" class="{{ app()->getLocale() === 'de' ? 'active' : '' }}">de</a>
            </li>
            <li><button class="theme-toggle" onclick="toggleTheme()" id="themeBtn">~$ theme</button></li>
        </ul>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        <div>
            <span>&copy; {{ date('Y') }} </span>
            <a href="{{ route('home') }}">{{ __('web_plumber') }}</a>
            <span> // {{ __('GNU Terry Pratchett') }}</span>
        </div>
        <div>
            <a href="{{ route('about') }}">{{ __('About') }}</a>
            <span> // </span>
            <a href="https://github.com/guttenbergovitz/web_plumber" target="_blank">git</a>
            <span> // {{ __('Monty Python approved') }}</span>
        </div>
    </footer>

    <script>
    function toggleTheme() {
        var html = document.documentElement;
        var current = html.getAttribute('data-theme');
        var next = current === 'dark' ? 'light' : current === 'light' ? 'boomer' : 'dark';
        html.setAttribute('data-theme', next);
        var btn = document.getElementById('themeBtn');
        if (btn) {
            btn.textContent = next === 'boomer' ? '~$ boomer' : '~$ theme';
        }
    }
    @stack('scripts')
    </script>
</body>
</html>
