<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ayo BerAksi</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Styles -->
        <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link rel="icon" href="/img/AyoBeraksi.svg">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-dark sticky-top  flex-md-nowrap p-0 shadow"  style="background-color: #D15151;">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Ayo BerAksi</a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-nav">
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
