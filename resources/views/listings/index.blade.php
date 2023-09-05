<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->

</head>

<body class="antialiased">

    <x-layout>
        @include('partials._hero')
        @include('partials._search')
        <h1>
            {{ $heading }}
        </h1>

        @unless (count($listings) == 0)
        <div class="grid grid-cols-2 gap-4 md:grid-cols-2">
            @foreach ($listings as $listing)
            <x-card><x-listing-card :listing="$listing" /></x-card>
        @endforeach
        </div>
        @else
            <h1>No posts</h1>
        @endunless

        <div class="mt-6 p-4">
            {{$listings->links()}}

        </div>
    </x-layout>
</body>

</html>
