<!DOCTYPE html>
@extends('layout')
@section('content')
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
    <h1>
        {{ $heading }}
    </h1>

    @unless (count($listings) == 0)

        @foreach ($listings as $listing)
            <a href="listings/{{ $listing['id'] }}">
                <h2>
                    {{ $listing['title'] }}
                </h2>
            </a>
            <p>
                {{ $listing['description'] }}
            </p>
        @endforeach
    @else
        <h1>No posts</h1>
    @endunless



</body>

</html>
@endsection
