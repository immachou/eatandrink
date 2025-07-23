<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Eat&Drink') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('build/assets/app-DbaZCfaT.css') }}" rel="stylesheet">
    @if (!request()->is('/') && !request()->is('home'))
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    @endif

    <!-- Scripts -->
    <script src="{{ asset('build/assets/app-BDAque31.js') }}" defer></script>
</head>
<body>
    <div id="app">


        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
@stack('scripts')
</body>
</html>
<nav>
    <!-- Autres liens -->
    <a href="{{ route('panier.index') }}" class="ml-4">
        Panier
        @php $count = session('panier') ? array_sum(session('panier')) : 0; @endphp
        @if($count > 0)
            <span class="bg-blue-500 text-white rounded-full px-2">{{ $count }}</span>
        @endif
    </a>
</nav>
