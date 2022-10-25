<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Coalitiontechnologies-test</title>

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body class="antialiased">
        <header class="page-title">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <h1>Coalitiontechnologies-test</h1>
                    </div>
                </div>
            </div>
        </header>
        <main>
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-3 h-100 left-panel">
                        Menu
                    </div>
                    <div class="col-9">
                        <div class="content">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>
