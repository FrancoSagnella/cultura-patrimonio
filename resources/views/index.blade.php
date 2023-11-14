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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

        @stack('styles')
        @stack('scripts')

    </head>
    <body>
        {{-- Contenedor de la pagina excluyendo el menú lateral --}}
        <div class="contenedor-pagina">
            {{-- Encabezado pagina --}}
            <header>
                <div class="container">
                    <div class="row">
                        <div class="d-flex justify-content-center">
                            <h1 class="text-celeste-argentina">Sistema de Patrimonio</h1>
                        </div>
                    </div>
                </div>
            </header>
            {{-- Contenido de la pagina --}}
            <div class="content">

                @yield('content')

            </div>
            {{-- Footer --}}
            <footer>
                <div class="footer bg-celeste-argentina">
                    <div class="container-fluid">
                        <div class="row justify-content-end">
                            <div class="secciones-footer col-md-2 my-3 mx-md-3 d-flex justify-content-center">
                                <div class="mt-md-2">
                                    Sistema de Patrimonio <br>
                                    Ministerio de Cultura de la Nacion
                                </div>
                            </div>
                            <div class="secciones-footer col-md-2 my-3 mx-md-3 d-flex justify-content-center">
                                Tel. [+54] +11 4129-2400 <br>
                                Dirección: Av. Alvear 1690 <br>
                                Ciudad de Buenos Aires, Argentina
                            </div>
                            <div class="col-md-2 my-3 mx-md-3 d-flex justify-content-center" style="min-width: 227px;">
                                <img src="{{ asset('img/Logo Ministerio Cultura Footer.png') }}" height="70">
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

        {{-- Menu Lateral --}}
        <div class="menu" id="sticky-menu">
            <div class="text-center">
                <img class="" src="{{ asset('img/Logo Ministerio Cultura Footer.png') }}" height="70">
            </div>


            <div class="mt-5">
                <a data-bs-toggle="collapse" href="#collapsePatrimonio" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <h5>Patrimonio</h5>
                </a>
            </div>
            <div class="collapse" id="collapsePatrimonio">
                <div class="">
                    <a class="links-texto" href="{{ route('patrimonio.index') }}">Listado Patrimonial</a><br>
                    <a class="links-texto" href="{{ route('patrimonio.create') }}">Alta Patrimonial</a><br>
                    <a class="links-texto" href="">Listado de Bajas</a><br>
                    <a class="links-texto" href="">Transferencia</a><br>
                    <a class="links-texto" href="">Estado de Transferencia</a><br>
                    <a class="links-texto" href="">Relevamiento</a><br>
                    <a class="links-texto" href="">Estado de Relevamiento</a><br>
                    <a class="links-texto" href="">Historico</a><br>
                    <a class="links-texto" href="">Amortizacion</a><br>
                    <a class="links-texto" href="">Remitos</a><br>
                    <a class="links-texto" href="">Resumen Ejecucion Anual</a><br>
                    <a class="links-texto" href="">Importar desde Excel</a><br>
                    <a class="links-texto" href="">Generar Excel para Importar</a><br>
                </div>
            </div>


            <div>
                <a data-bs-toggle="collapse" href="#collapseAdministracion" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <h5>Administración</h5>
                </a>
            </div>
            <div class="collapse" id="collapseAdministracion">
                <div class="">
                    <a class="links-texto" href="{{ route('ubicaciones.index') }}">Ubicaciones</a><br>
                    <a class="links-texto" href="">Direcciones</a><br>
                    <a class="links-texto" href="">Dependencias</a><br>
                    <a class="links-texto" href="">Proveedores</a><br>
                    <a class="links-texto" href="">Tipos de Baja</a><br>
                    <a class="links-texto" href="{{ route('tipos-ingreso.index') }}">Tipos de Ingreso</a><br>
                    <a class="links-texto" href="{{ route('tipos-bien.index') }}">Tipos de Bien</a><br>
                    <a class="links-texto" href="">Tipos de Asignacion</a><br>
                    <a class="links-texto" href="">Tipos de Responsable</a><br>
                    <a class="links-texto" href="">Tipos de Remito</a><br>
                    <a class="links-texto" href="">Universos</a><br>
                </div>
            </div>


        </div>



        {{-- <script>
            window.addEventListener("scroll", function() {
            var menu = document.getElementById("sticky-menu");
            var scrollPosition = window.scrollY;

            if (scrollPosition > 0) {
                menu.style.position = "sticky";
                menu.style.top = "0";
            } else {
                menu.style.position = "absolute";
                menu.style.top = "0"; // Ajusta la posición inicial si es necesario
            }
        });
        </script> --}}
    </body>

</html>
