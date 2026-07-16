@extends('layouts.app')

@section('title', __('web_plumber'))
@section('meta_description', __('Internet plumbing since the tubes were copper.'))

@section('content')
<style>
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
    #motd-slides-container { position: relative; min-height: 4.5rem; }

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

    .hero { padding: 1.5rem 0 2.5rem; border-bottom: 1px solid var(--border); }
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

    .pain-card {
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 1.5rem;
        background: var(--bg-surface);
        transition: border-color 0.25s;
    }
    .pain-card:hover { border-color: var(--red); }
    .pain-card .icon { font-size: 1.2rem; margin-bottom: 0.5rem; color: var(--red); }
    .pain-card h3 { color: var(--red); margin-bottom: 0.5rem; }
    .pain-card p { font-size: var(--fs-small); line-height: var(--lh-body); color: var(--text-secondary); }

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
    .quote-box cite { font-size: var(--fs-small); color: var(--text-tertiary); font-style: normal; }
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
    .fortune-box .fortune-text { font-size: var(--fs-small); color: var(--text-secondary); line-height: var(--lh-body); flex: 1; }
    .fortune-box .fortune-hint { font-size: var(--fs-meta); color: var(--text-tertiary); flex-shrink: 0; }
</style>

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
    <div class="hero-clarify">{{ __('Web plumbing. Really. Not water pipes.') }}</div>
</section>

<section id="problem">
    <div class="section-header"><span class="prefix">$</span> cat problem</div>
    <div class="grid-3">
        <a href="{{ route('problem') }}" class="pain-card" style="text-decoration:none;color:inherit;display:block">
            <div class="icon">!</div>
            <h3>{{ __('Mówią że trzeba przepisać wszystko') }}</h3>
            <p>{{ __('Słyszysz to od każdego "konsultanta". My nie przepisujemy — ulepszamy. Twój kod działa, tylko wymaga opieki.') }}</p>
        </a>
        <a href="{{ route('problem') }}" class="pain-card" style="text-decoration:none;color:inherit;display:block">
            <div class="icon">!</div>
            <h3>{{ __('Nie możesz znaleźć specjalisty') }}</h3>
            <p>{{ __('Wszyscy gonią za nowym stackiem. Kto ogarnie Twój 10-letni monolit? Ktoś kto go szanuje.') }}</p>
        </a>
        <a href="{{ route('problem') }}" class="pain-card" style="text-decoration:none;color:inherit;display:block">
            <div class="icon">!</div>
            <h3>{{ __('Masz wrażenie że toniesz w długu technicznym') }}</h3>
            <p>{{ __('Ale nie stać Cię na miesięczny przepis wszystkiego. My robimy to w zwinnych kawałkach.') }}</p>
        </a>
    </div>
</section>

<section id="services">
    <div class="section-header section-header-orange"><span class="prefix">&gt;</span> {{ __('Services') }}</div>
    <div class="grid-3">
        @foreach(config('services') as $s)
        <a href="{{ route('services.detail', $s['slug']) }}" class="card" style="text-decoration:none;color:inherit;display:block">
            <h3 style="font-family:var(--font-mono);font-size:1.1rem">{{ $s['icon'] }} {{ $s['title'] }}</h3>
            <p>{{ $s['short'] }}</p>
        </a>
        @endforeach
    </div>
</section>

<section id="stack">
    <div class="section-header section-header-blue"><span class="prefix">##</span> {{ __('Stack') }}</div>
    <p style="margin-bottom:1.5rem;color:var(--text-secondary);font-size:var(--fs-small);max-width:720px;line-height:var(--lh-body)">
        {{ __('Poniższe technologie to nie lista "co znamy". To ekosystemy, w których pracujemy od lat. Każda z nich ewoluowała — wiemy jak, bo byliśmy przy tym.') }}
    </p>
    <div class="grid-3" style="margin-bottom:2rem">
        @foreach(config('stack') as $tech)
        <div class="card" style="cursor:default">
            <h3>{{ $tech['name'] }} <span style="font-size:var(--fs-meta);color:var(--text-tertiary);font-weight:400">{{ $tech['version'] }}</span></h3>
            <p>{{ $tech['exp'] }} {{ __('lat') }} — {{ $tech['note'] }}</p>
            <div style="margin-top:0.5rem">
                @foreach($tech['tags'] as $tag)
                <span class="tag tag-green">{{ $tag }}</span>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
    <a href="{{ route('about') }}" style="font-size:var(--fs-small);color:var(--blue)">{{ __('Więcej o naszym stacku') }} &#8594;</a>
</section>

<section id="ai-llm">
    <div class="section-header"><span class="prefix">$</span> echo "AI / LLM"</div>
    <div class="card" style="margin-bottom:1.5rem">
        <p style="font-size:var(--fs-body);line-height:var(--lh-loose);margin-bottom:0.75rem">
            <strong style="color:var(--orange)">{{ __('AI to najfajniejsza zabawka od chleba z masłem.') }}</strong>
            <br>
            {{ __('Używamy jej codziennie do generowania testów, analizy kodu, dokumentacji.') }}
        </p>
        <p style="font-size:var(--fs-small);color:var(--text-secondary);line-height:var(--lh-body)">
            {{ __('Ale AI nie napisze Ci dobrego monolitu. Nie ogarnie legacy. My łączymy: sprawdzone fundamenty + AI jako turbo.') }}
        </p>
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
@endsection

@push('scripts')
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
    function resetTimer() { clearInterval(timer); timer = setInterval(next, 7000); }

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
@endpush
