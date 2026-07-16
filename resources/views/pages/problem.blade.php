@extends('layouts.app')

@section('title', __('Problem') . ' — ' . __('web_plumber'))
@section('meta_description', __('Masz problem z legacy kodem? Nie możesz znaleźć specjalisty?'))

@section('content')
<div class="page-header">
    <h1>{{ __('Brzmi znajomo?') }}</h1>
    <p>{{ __('Nie jesteś sam. Te historie słyszymy codziennie.') }}</p>
</div>

<div class="page-section">
    <h2><span class="prefix">!</span> {{ __('Mówią że trzeba przepisać wszystko') }}</h2>
    <p>{{ __('Przychodzi konsultant. Otwiera kod. Krzywi się. Mówi: "to się nie nadaje, trzeba przepisać od zera na [wstaw modny framework]".') }}</p>
    <p>{{ __('Tylko że on nie będzie utrzymywał tego kodu przez następne 5 lat. Nie będzie siedział w nocy, gdy coś padnie. Nie będzie tłumaczył klientowi, dlaczego termin się przesuwa.') }}</p>
    <p><strong style="color:var(--green)">{{ __('My nie przepisujemy — ulepszamy.') }}</strong> {{ __('Twój kod działa, tylko wymaga opieki. A czasem wymaga mniej niż myślisz.') }}</p>
</div>

<div class="page-section">
    <h2><span class="prefix">!</span> {{ __('Nie możesz znaleźć specjalisty') }}</h2>
    <p>{{ __('Ogłoszenie: "Senior Developer, PHP 5.6, brak testów, własny framework, brak dokumentacji" — i cisza.') }}</p>
    <p>{{ __('Wszyscy chcą pracować z najnowszym stackiem. Nikt nie chce dotykać "starego kodu". A przecież ten kod zarabia pieniądze. Ktoś go pisał z myślą o biznesie, nie o portfolio na GitHubie.') }}</p>
    <p>{{ __('My nie mamy problemu z "starym kodem". Dla nas to po prostu kod. PHP 5.6, Symfony 2, Django 1.11 — ogarniamy. Nie oceniamy. Naprawiamy.') }}</p>
</div>

<div class="page-section">
    <h2><span class="prefix">!</span> {{ __('Masz wrażenie że toniesz w długu technicznym') }}</h2>
    <p>{{ __('Dług techniczny nie powstaje dlatego, że ktoś napisał zły kod. Powstaje, bo brakuje czasu, budżetu i zespołu, żeby utrzymać porządek.') }}</p>
    <p>{{ __('Nie stać Cię na miesięczny przestój i przepisywanie wszystkiego? Nas też nie. Dlatego robimy to w małych, bezpiecznych kawałkach. Dziś testy dla najważniejszej funkcji. Jutro podbicie wersji frameworka. Za tydzień — CI/CD.') }}</p>
    <p>{{ __('Krok po kroku, bez zatrzymywania produkcji, bez ryzyka.') }}</p>
</div>

<div class="page-section">
    <h2><span class="prefix">$</span> cat antidotum</h2>
    <p><strong style="color:var(--orange)">{{ __('Jak z tym żyć?') }}</strong></p>
    <ul>
        <li>{{ __('Nie wierz w "przepisz od zera" — to najdroższa i najrzadziej potrzebna opcja') }}</li>
        <li>{{ __('Nie czekaj aż będzie idealnie — zacznij od małych kroków') }}</li>
        <li>{{ __('Nie szukaj "młodego wilka" do legacy — znajdź kogoś, kto szanuje Twój kod') }}</li>
        <li>{{ __('Nie kupuj większego serwera — zanim to zrobisz, zoptymalizuj to co masz') }}</li>
        <li>{{ __('Nie ufaj narzędziu, które obiecuje wszystko — zaufaj komuś, kto wie, że proste rozwiązania są najlepsze') }}</li>
    </ul>
</div>

<section class="cta-section">
    <div class="prompt">$ {{ __('Brzmi znajomo?') }}</div>
    <h2>{{ __('Gadajmy. Albo napisz.') }}</h2>
    <p>{{ __('Bez zobowiązań, bez sprzedaży. Pogadamy o kodzie.') }}</p>
    <a href="mailto:hello@web-plumber.dev" class="cta-link">hello@web-plumber.dev</a>
</section>
@endsection
