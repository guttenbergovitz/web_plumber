@extends('layouts.app')

@section('title', __('About') . ' — ' . __('web_plumber'))
@section('meta_description', __('Kim jesteśmy i dlaczego wierzymy w sprawdzone technologie.'))

@section('content')
<div class="page-header">
    <h1>{{ __('Kim jesteśmy') }}</h1>
    <p>{{ __('Internet plumbing since the tubes were copper.') }}</p>
</div>

<div class="page-section">
    <h2><span class="prefix">$</span> cat filosofia</h2>
    <p>{{ __('Jesteśmy kolektywem senior developerów, którzy wierzą w solidne fundamenty. Nie gonimy za każdym nowym frameworkiem — skupiamy się na tym, co faktycznie działa.') }}</p>
    <p>{{ __('Nasz konserwatyzm nie oznacza zamknięcia na zmiany. Oznacza szacunek dla kodu, który działa i zarabia pieniądze. Zanim powiemy "przepisz", pytamy: "a co jeśli da się to naprawić?".') }}</p>
    <p>{{ __('PHP, Python, Java, Ruby, PostgreSQL — to nie są "przestarzałe technologie". To sprawdzone narzędzia, które ewoluują. Laravel 12, Spring Boot 3, Rails 8, Django 5 — to nowoczesne frameworki, które nie mają się czego wstydzić.') }}</p>
</div>

<div class="page-section">
    <h2><span class="prefix">$</span> cat ai-llm</h2>
    <p><strong style="color:var(--orange)">{{ __('AI to najfajniejsza zabawka od czasu wynalezienia chleba z masłem. Używamy jej codziennie.') }}</strong></p>
    <p>{{ __('Generujemy testy, analizujemy kod, piszemy dokumentację, refaktorujemy. LLM (Claude, GPT) to nasze codzienne narzędzia — tak samo jak terminal i edytor.') }}</p>
    <p>{{ __('Ale AI nie napisze Ci dobrego monolitu. Nie ogarnie 10-letniego legacy. Nie zrozumie Twojej domeny. Nie powie Ci które zależności są naprawdę krytyczne, a które można bezpiecznie usunąć.') }}</p>
    <p><strong style="color:var(--green)">{{ __('My łączymy: sprawdzone fundamenty + AI jako turbo.') }}</strong></p>
    <div class="note-box">
        <strong>{{ __('Konkretnie:') }}</strong>
        <ul style="margin-top:0.5rem">
            <li>{{ __('GPT do generowania testów jednostkowych i integracyjnych') }}</li>
            <li>{{ __('Claude do analizy kodu i proponowania refactoringu') }}</li>
            <li>{{ __('AI-assisted code review — ale każdą zmianę sprawdzamy ręcznie') }}</li>
            <li>{{ __('Generowanie dokumentacji API i migracji') }}</li>
            <li>{{ __('Analiza logów i identyfikacja błędów') }}</li>
        </ul>
    </div>
    <p>{{ __('Nie wierzymy w "AI zastąpi programistów". Wierzymy w "programista z AI zrobi 3x więcej, ale wciąż musi wiedzieć co robi".') }}</p>
</div>

<div class="page-section">
    <h2><span class="prefix">##</span> {{ __('Technologie') }}</h2>
    <p>{{ __('Poniższe technologie to nie lista "co znamy". To ekosystemy, w których pracujemy od lat. Każda z nich ewoluowała — wiemy jak, bo byliśmy przy tym.') }}</p>

    <div class="grid-3">
        @foreach($stack as $tech)
        <div class="card" style="cursor:default">
            <h3 style="display:flex;align-items:baseline;gap:0.5rem;flex-wrap:wrap">
                {{ $tech['name'] }}
                <span style="font-size:var(--fs-meta);color:var(--text-tertiary);font-weight:400">{{ $tech['version'] }}</span>
            </h3>
            <p>{{ $tech['exp'] }} {{ __('lat doświadczenia') }}</p>
            <p style="margin-top:0.5rem">{{ $tech['note'] }}</p>
            <div style="margin-top:0.75rem">
                @foreach($tech['tags'] as $tag)
                <span class="tag tag-green">{{ $tag }}</span>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="page-section">
    <h2><span class="prefix">&gt;</span> {{ __('Podejście') }}</h2>
    <p>{{ __('Nie sprzedajemy przepisywania na nowy framework. Sprzedajemy rozwiązanie problemu.') }}</p>
    <p>{{ __('Jeśli Twój 10-letni monolit w PHP 7.4 działa i zarabia — nie potrzebuje Kafka, mikroserwisów ani przepisania na Go. Potrzebuje audytu, testów, podbicia wersji i monitoring.') }}</p>
    <p>{{ __('Jeśli jednak przyszedł czas na zmiany — robimy to bez rewolucji. Krok po kroku, z testami, z rollbackiem.') }}</p>
    <p><strong style="color:var(--green)">{{ __('Usprawniamy. Nie wynajdujemy koła od nowa.') }}</strong></p>
</div>
@endsection
