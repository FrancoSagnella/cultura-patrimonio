<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta id="csfr" name="csrf-token" content="{{ csrf_token() }}">

        <title>Patrimonio Cultura</title>
        <link rel="icon" href="{{ asset('img/favicon.ico') }}"/>

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">


        @stack('styles')
        @stack('scripts')

    </head>
    <header>
        <nav class="navbar navbar-top navbar-default bg-celeste-argentina navbar-custom">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/" aria-label="Argentina.gob.ar Presidencia de la Nación">
                        <img src="{{asset('img/logo_argentina-blanco.svg')}}" height="50">
                    </a>
                </div>
            </div>
        </nav>

        <div class="header-description text-center">
            <h1>Sistema de gestion de Patrimonio del Ministerio de Cultura</h1>
        </div>


    </header>

    <body>

        <script>
            var asd = document.getElementById('csfr').content;
            console.log(asd);
        </script>

        @yield('page')

    </body>

    <footer>
        <div class="footer bg-celeste-argentina">
            <div class="container">
                <img class="mt-4 mb-4" src="{{ asset('img/logo_primerolagente.svg') }}" height="100">
            </div>
        </div>
    </footer>
</html>
