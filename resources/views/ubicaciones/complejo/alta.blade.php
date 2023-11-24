<form action="/" method="post" enctype="multipart/form-data" id="formAlta">
    @csrf
    <div class="container">

        {{-- Tipo ubicacion Input --}}
        <div class="row">
            <div class="col-2 mt-1">
                Tipo de ubicación
            </div>
            <div class="col-8">
                <select class="form-control" name="tipoUbicacion" id="tipoUbicacion">
                    <option value="" selected>Seleccione</option>
                    <option value="complejo">Complejo</option>
                    <option value="edificio">Edificio</option>
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
                <select class="form-control" name="direccion" id="direccion">
                    <option value="" selected>Seleccione</option>
                    @foreach ($direcciones as $direccion)
                        <option value="{{$direccion->id}}">{{$direccion->nombre_provincia}}, {{$direccion->loc}} {{$direccion->cp}} {{$direccion->calle}} {{$direccion->nro}}, {{$direccion->tel}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-2 mt-3">
                <div class="btn btn-success btn-block botones-redondos mx-2" onclick="mostrarFormDomicilio()">Nuevo domicilio</div>
            </div>
        </div>
        <input type="hidden" id="flagDireccion" name="flagDireccion" value="0">
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
                            <option value="" selected>Seleccione</option>
                            @foreach ($provincias as $provincia)
                                <option value="{{$provincia->id}}">{{$provincia->nombre_provincia}}</option>
                            @endforeach
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
                <select class="form-control" name="dependencia" id="dependencia" onchange="mostrarResponsable()">
                    <option value="" selected>Seleccione</option>
                    <option value="1">Ministerio de cultura de la nacion</option>
                </select>
            </div>
        </div>
        {{-- Dependencia input --}}

        {{-- Seccion para mostrar al responsable --}}
        <div class="row mt-5 border-top" id="seccionResponsable" style="display: none">
            <div class="col">

                <div class="row">
                    <div class="col-2 mt-3">
                        Tipo Responsable
                    </div>
                    <div class="col-8 mt-3">
                        <input disabled class="form-control" type="text" name="tipoResponsable" id="tipoResponsable" value="Ministro">
                    </div>
                </div>

                <div class="row">
                    <div class="col-2 mt-3">
                        Nombre
                    </div>
                    <div class="col-8 mt-3">
                        <input disabled class="form-control" type="text" name="nombreResponsable" id="nombreResponsable" value="Juancito">
                    </div>
                </div>

                <div class="row">
                    <div class="col-2 mt-3">
                        Apellido
                    </div>
                    <div class="col-8 mt-3">
                        <input disabled class="form-control" type="text" name="apellidoResponsable" id="apellidoResponsable" value="Juancito">
                    </div>
                </div>

                <div class="row">
                    <div class="col-2 mt-3">
                        DNI
                    </div>
                    <div class="col-8 mt-3">
                        <input disabled class="form-control" type="text" name="dniResponsable" id="dniResponsable" value="11222333">
                    </div>
                </div>

                <div class="row">
                    <div class="col-2 mt-3">
                        Mail
                    </div>
                    <div class="col-8 mt-3">
                        <input disabled class="form-control" type="text" name="mailResponsable" id="mailResponsable" value="Juancito@gmail.com">
                    </div>
                </div>

                <div class="row">
                    <div class="col-2 mt-3">
                        Tipo de Asignacion
                    </div>
                    <div class="col-8 mt-3">
                        <select disabled class="form-control" name="provincia" id="provincia">
                            <option value="" selected>Tipo de asignacion</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-2 mt-3">
                        Numero de Asignacion
                    </div>
                    <div class="col-8 mt-3">
                        <input disabled class="form-control" type="text" name="nroAsignacionReposnsable" id="nroAsignacionReposnsable" value="2">
                    </div>
                </div>

                <div class="row">
                    <div class="col-2 mt-3">
                        Año de Asignacion
                    </div>
                    <div class="col-8 mt-3">
                        <input disabled class="form-control" type="text" name="anioAsignacionReposnsable" id="anioAsignacionReposnsable" value="2020">
                    </div>
                </div>
            </div>
        </div>
        {{-- Termina seccion para mostrar al responsable --}}

        <div class="row mt-4">
            <div class="col-6 text-end">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
            <div class="col-6">
                <button type="button" class="btn btn-primary" onclick="enviarFormAlta('complejos')">Guardar</button>
            </div>
        </div>
    </div>
</form>
