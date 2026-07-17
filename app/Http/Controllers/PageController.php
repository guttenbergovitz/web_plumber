<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class PageController extends Controller
{
    public function about(): Response
    {
        $stack = config('stack');

        return response()->view('pages.about', compact('stack'));
    }

    public function services(): Response
    {
        $services = config('plumber-services');

        return response()->view('pages.services', compact('services'));
    }

    public function serviceDetail(string $slug): Response
    {
        $services = config('plumber-services');
        $service = collect($services)->firstWhere('slug', $slug);

        if (!$service) {
            abort(404);
        }

        $stack = collect(config('stack'))->filter(fn ($t) =>
            in_array(explode(' ', $t['name'])[0], $service['techs']) ||
            collect($service['techs'])->contains(fn ($tech) => str_contains($t['name'], $tech))
        )->values()->all();

        return response()->view('pages.service-detail', compact('service', 'stack'));
    }

    public function problem(): Response
    {
        return response()->view('pages.problem');
    }

    public function aiReality(): Response
    {
        return response()->view('pages.ai-reality');
    }
}
