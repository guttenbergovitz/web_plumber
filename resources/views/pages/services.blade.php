@extends('layouts.app')

@section('title', __('Services') . ' — ' . __('web_plumber'))
@section('meta_description', __('Audyt, legacy support, modernizacja, performance, bezpieczeństwo, devops.'))

@section('content')
<div class="page-header">
    <h1>{{ __('Services') }}</h1>
    <p>{{ __('Nie sprzedajemy przepisywania na nowy framework. Sprzedajemy rozwiązanie problemu.') }}</p>
</div>

<div class="grid-3">
    @foreach($services as $service)
    <a href="{{ route('services.detail', $service['slug']) }}" class="card" style="text-decoration:none;color:inherit;display:block">
        <h3 style="font-family:var(--font-mono);font-size:1.2rem">{{ $service['icon'] }}</h3>
        <h3 style="margin-top:0.5rem">{{ $service['title'] }}</h3>
        <p>{{ $service['short'] }}</p>
        <div style="margin-top:0.75rem;display:flex;gap:0.35rem;flex-wrap:wrap">
            @foreach($service['techs'] as $tech)
            <span class="tag tag-orange">{{ $tech }}</span>
            @endforeach
        </div>
    </a>
    @endforeach
</div>
@endsection
