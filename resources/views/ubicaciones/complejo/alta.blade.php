@extends('index')
@push('styles')
@endpush
@section('content')

<div class="container-fluid py-3 contenedor-gris-redondeado">

    <div class="row justify-content-center mt-3">
        <div class="col-md-4 titulo-redondeado-celeste">
            <div class="row text-center">
                <h1>Alta de Cmplejo / Edificio</h1>
            </div>
        </div>
    </div>

    <div class="row mt-3 mb-3">
        <div class="col">
            <form action="/complejos" method="post" enctype="multipart/form-data">
                @csrf




                <div class="container">{{-- Form content --}}
                    <div class="row mt-3 text-center">
                        <div class="col">

                            {{-- Tipo ubicacion Input --}}
                            <div class="row">
                                <div class="col-2 mt-1">
                                    Tipo de ubicación
                                </div>
                                <div class="col-8">
                                    <select class="form-control" name="tipoUbicacion" id="tipoUbicacion">
                                        <option value="default" selected>Seleccione</option>
                                        <option value="Complejo">Complejo</option>
                                        <option value="Edificio">Edificio</option>
                                    </select>
                                </div>
                            </div>
                            {{-- Tipo ubicacion Input --}}

                            {{-- Nombre complejo / edificio input --}}
                            <div class="row">
                                <div class="col-2 mt-3">
                                    Nombre
                                </div>
                                <div class="col-8 mt-3">
                                    <input class="form-control" type="text" name="nombre" id="nombre">
                                </div>
                            </div>
                            {{-- Nombre complejo / edificio input --}}

                            {{-- Direccion Input --}}
                            <div class="row">
                                <div class="col-2 mt-3">
                                    Domicilio
                                </div>
                                <div class="col-6 mt-3">
                                    <select class="form-control" name="tipoUbicacion" id="tipoUbicacion">
                                        <option value="default" selected>Seleccione</option>
                                    </select>
                                </div>
                                <div class="col-2 mt-3">
                                    <div class="btn btn-success btn-block botones-redondos mx-2" onclick="mostrarFormDomicilio()">Nuevo domicilio</div>
                                </div>
                            </div>
                            {{-- Direccion Input --}}


                            {{-- Seccion para el alta de una nueva direccion --}}
                            <div class="row" id="seccionDireccion" style="display: none">
                                <div class="col">

                                    {{-- Calle input --}}
                                    <div class="row">
                                        <div class="col-2 mt-3">
                                            Calle
                                        </div>
                                        <div class="col-8 mt-3">
                                            <input class="form-control" type="text" name="calle" id="calle">
                                        </div>
                                    </div>

                                    {{-- Numero input --}}
                                    <div class="row">
                                        <div class="col-2 mt-3">
                                            Numero
                                        </div>
                                        <div class="col-8 mt-3">
                                            <input class="form-control" type="text" name="numero" id="numero">
                                        </div>
                                    </div>

                                    {{-- Codigo postal input --}}
                                    <div class="row">
                                        <div class="col-2 mt-3">
                                            Codigo Postal
                                        </div>
                                        <div class="col-8 mt-3">
                                            <input class="form-control" type="text" name="codPostal" id="codPostal">
                                        </div>
                                    </div>

                                    {{-- Localidad input --}}
                                    <div class="row">
                                        <div class="col-2 mt-3">
                                            Localidad
                                        </div>
                                        <div class="col-8 mt-3">
                                            <input class="form-control" type="text" name="localidad" id="localidad">
                                        </div>
                                    </div>

                                    {{-- Telefono --}}
                                    <div class="row">
                                        <div class="col-2 mt-3">
                                            Telefono
                                        </div>
                                        <div class="col-8 mt-3">
                                            <input class="form-control" type="text" name="telefono" id="telefono">
                                        </div>
                                    </div>

                                    {{-- Provincia --}}
                                    <div class="row">
                                        <div class="col-2 mt-3">
                                            Provincia
                                        </div>
                                        <div class="col-8 mt-3">
                                            <select class="form-control" name="provincia" id="provincia">
                                                <option value="default" selected>Seleccione</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Termina seccion para alta de nueva direccion --}}

                            {{-- Dependencia input --}}
                            <div class="row">
                                <div class="col-2 mt-3">
                                    Dependencia
                                </div>
                                <div class="col-8 mt-3">
                                    <select class="form-control" name="dependencia" id="dependencia">
                                        <option value="default" selected>Seleccione</option>
                                    </select>
                                </div>
                            </div>
                            {{-- Dependencia input --}}

                            {{-- Seccion para mostrar al responsable --}}
                            <div class="row" id="seccionResponsable">
                            </div>
                            {{-- Termina seccion para mostrar al responsable --}}

                        </div>


                    </div>





                    <div class="row justify-content-center my-3">
                        <div class="col-lg-4 text-center">
                            <a class="btn btn-danger btn-block botones-redondos mx-2" href="">Cancelar</a>
                            <button type="submit" class="btn btn-success btn-block botones-redondos mx-2">Guardar</button>
                        </div>
                    </div>
                </div>




            </form>
        </div>
    </div>
</div>


@endsection
@push('scripts')
    <script src="{{asset('js/ubicaciones/altaComplejoEdificioScripts.js')}}"></script>
@endpush
