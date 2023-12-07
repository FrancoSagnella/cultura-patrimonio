<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta id="csrf" name="csrf-token" content="{{ csrf_token() }}">

        <title>Patrimonio Cultura</title>
        <link rel="icon" href="{{ asset('img/favicon.ico') }}"/>

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/0c5ecc6b8a.js" crossorigin="anonymous"></script>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

        @stack('styles')
        @stack('scripts')

    </head>
    <body>
        <div class="">
            {{-- Menu Lateral --}}
             @include('sidebar')
            @include('offcanvas')

            {{-- Contenedor de la pagina excluyendo el menú lateral --}}
            <div class="contenedor-pagina">
                {{-- Encabezado pagina --}}
                <header>
                    <div class="container">
                        <div class="row">

                            <div class="col">
                                <div class="d-flex justify-content-center">
                                    <h1 class="text-celeste-argentina">Sistema de Patrimonio</h1>
                                </div>
                            </div>

                            <div class="col titulo-redondeado-celeste">
                                <div class="d-flex justify-content-center">
                                    <h1>Listado Patrimonial</h1>
                                </div>
                            </div>

                            <!-- <div class="d-flex justify-content-center">
                                <input id="buscar" type="text" placeholder="Buscar...">
                              </div> -->
                              <!-- <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                <input id="buscar" type="text" class="form-control" placeholder="Buscar..."> -->
                            <div class="col">

                                    <div class="input-group">
                                        <input id="buscar" type="text" class="form-control" placeholder="Buscar..." aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                                        </div>
                                    </div>
                            </div>

                            
                            <!-- <div class=" ">
                                <div class=" ">
                                    <input id="AAAA" type="text" placeholder="AAAAA...">
                                </div>
                            </div> -->
                        </div>
                    </div>
                </header>
                {{-- Contenido de la pagina --}}
                <div class="content">

                    @yield('content')

                </div>   
                {{-- Footer --}}
                @include('footer')
            </div>
        </div>

    </body>

</html>
