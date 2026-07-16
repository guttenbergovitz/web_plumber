@extends('layouts.app')

@section('title', $service['title'] . ' — ' . __('web_plumber'))
@section('meta_description', $service['short'])

@section('content')
<div class="page-header">
    <h1 style="font-family:var(--font-mono);font-size:2rem">{{ $service['icon'] }} {{ $service['title'] }}</h1>
    <p>{{ $service['short'] }}</p>
</div>

<div class="page-section">
    <h2><span class="prefix">&gt;</span> {{ __('Opis') }}</h2>
    <p>{{ $service['body'] }}</p>
</div>

@if(!empty($service['process']))
<div class="page-section">
    <h2><span class="prefix">##</span> {{ __('Proces') }}</h2>
    <ul>
        @foreach($service['process'] as $step)
        <li>{{ $step }}</li>
        @endforeach
    </ul>
</div>
@endif

@if(!empty($stack))
<div class="page-section">
    <h2><span class="prefix">//</span> {{ __('Technologie') }}</h2>
    <div style="display:flex;gap:0.5rem;flex-wrap:wrap">
        @foreach($stack as $tech)
        <a href="{{ route('about') }}" style="display:block;border:1px solid var(--border);border-radius:var(--radius);padding:0.75rem 1rem;background:var(--bg-surface);text-decoration:none;color:inherit;transition:border-color 0.2s" onmouseover="this.style.borderColor='var(--green)'" onmouseout="this.style.borderColor=''">
            <div style="font-weight:600;color:var(--cyan);font-size:var(--fs-small)">{{ $tech['name'] }}</div>
            <div style="font-size:var(--fs-meta);color:var(--text-tertiary);margin-top:0.2rem">{{ $tech['version'] }} · {{ $tech['exp'] }}+ {{ __('lat') }}</div>
        </a>
        @endforeach
    </div>
</div>
@endif

<section class="cta-section">
    <div class="prompt">$ {{ __('Gadajmy. Albo napisz.') }}</div>
    <h2>{{ __('Potrzebujesz takiej usługi?') }}</h2>
    <p>{{ __('Opowiedz nam o swoim projekcie. Bez zobowiązań.') }}</p>
    <a href="mailto:hello@web-plumber.dev" class="cta-link">hello@web-plumber.dev</a>
</section>
@endsection
