<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $quotes = [
            [
                'text' => __('The universe is under no obligation to make sense to you.'),
                'author' => __('Pratchett'),
            ],
            [
                'text' => __('A common mistake that people make when trying to design something completely foolproof is to underestimate the ingenuity of complete fools.'),
                'author' => __('Adams'),
            ],
            [
                'text' => __('Let\'s not go to Camelot. It is a silly place.'),
                'author' => __('Python'),
            ],
            [
                'text' => __('We don\'t make mistakes, we have happy little accidents.'),
                'author' => __('Ross'),
            ],
            [
                'text' => __('It\'s not a bug, it\'s an undocumented feature.'),
                'author' => __('Anonymous'),
            ],
            [
                'text' => __('There are only two hard things in computer science: cache invalidation, naming things, and off-by-one errors.'),
                'author' => __('Anonymous'),
            ],
            [
                'text' => __('I think the problem, to be quite honest with you, is that you\'ve never actually known what the question is.'),
                'author' => __('Deep Thought'),
            ],
            [
                'text' => __('The answer is 42.'),
                'author' => __('Deep Thought'),
            ],
            [
                'text' => __('We have such sights to show you.'),
                'author' => __('Pinhead'),
            ],
            [
                'text' => __('A developer is a person who develops. That is, someone who takes an existing thing and develops it further.'),
                'author' => __('Anonymous'),
            ],
        ];

        $quote = $quotes[array_rand($quotes)];

        return view('welcome', compact('quote'));
    }
}
