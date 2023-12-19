<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css')}}">
        <link href="{{ asset('dist/css/lightbox.min.css') }}" rel="stylesheet">


        <!-- Scripts -->
        
        <script src="{{ asset('js/jquery.js')}}"></script>
        <script src="{{ asset('js/bootstrap-datepicker.js')}}"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .rating {
      unicode-bidi: bidi-override;
      direction: rtl;
      text-align: center;
    }

    .rating > input {
      display: none;
    }

    .rating > label {
      display: inline-block;
      position: relative;
      width: 1.1em;
      font-size: 2em;
      color: #aaa8a8;
      cursor: pointer;
    }

    .rating > label::before {
      content: '\2605';
      position: absolute;
      opacity: 0.5;
      transition: opacity 0.25s;
    }

    .rating > label:hover:before,
    .rating > label:hover ~ label:before,
    .rating > input:checked ~ label:before {
      opacity: 1;
      color: #ffcc00;
    }
    </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <script src="{{ asset('dist/js/lightbox-plus-jquery.min.js') }}"></script>
    </body>
</html>
