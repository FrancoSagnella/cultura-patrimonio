
    <div class="container">

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

        {{-- Dependencia input --}}
        <div class="row">
            <div class="col-2 mt-3">
                Dependiente de
            </div>
            <div class="col-8 mt-3">
                <select class="form-control" name="dependencia" id="dependencia" onchange="mostrarResponsable()">
                    <option value="" selected res_id=""> Seleccione una dependencia</option>
                    @foreach ($dependencias as $dependencia)
                        <option value="{{$dependencia->id}}" res_id="{{$dependencia->res_id}}"> {{ $dependencia->descr }} </option>
                    @endforeach
                </select>
            </div>
        </div>
        {{-- Dependencia input --}}

        {{-- Direccion Input --}}
        <div class="row">
            <div class="col-2 mt-3">
                Domicilio
            </div>
            <div class="col-6 mt-3">
                <select class="form-control" name="direccion" id="direccion">
                    <option value="" selected>Seleccione un domicilio</option>

                    @foreach ($direcciones as $direccion)
                        <option value="{{$direccion->id}}"> {{$direccion->provincia_nombre}}, {{$direccion->localidad_nombre}} {{$direccion->cp}} {{$direccion->calle}} {{$direccion->nro}}, {{$direccion->tel}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-2 mt-3">
                <div class="btn btn-success btn-block botones-redondos mx-2" onclick="mostrarFormDomicilio()">Nuevo domicilio</div>
            </div>
        </div>
        <input type="hidden" id="flagDireccion" name="flagDireccion" value="0">
        {{-- Direccion Input --}}


        <div class="row" id="seccionDireccion">

        </div>

        {{-- Seccion para mostrar al responsable HAY QUE HACERLA DINAMICA--}}
        <div class="row mt-5 border-top" id="seccionResponsable" style="display: none">
            <div class="col">

                <div class="row">
                    <div class="col-2 mt-3">
                        Tipo Responsable
                    </div>
                    <div class="col-8 mt-3">
                        <select  class="form-control" name="tipoResponsable" id="tipoResponsable">
                            <option value="" id_tipo="" selected>Tipo de Responsable</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-2 mt-3">
                        Nombre
                    </div>
                    <div class="col-8 mt-3">
                        <input class="form-control" type="text" name="nombreResponsable" id="nombreResponsable" value="">
                    </div>
                </div>

                <div class="row">
                    <div class="col-2 mt-3">
                        Apellido
                    </div>
                    <div class="col-8 mt-3">
                        <input class="form-control" type="text" name="apellidoResponsable" id="apellidoResponsable" value="">
                    </div>
                </div>

                <div class="row">
                    <div class="col-2 mt-3">
                        DNI
                    </div>
                    <div class="col-8 mt-3">
                        <input class="form-control" type="text" name="dniResponsable" id="dniResponsable" value="">
                    </div>
                </div>

                <div class="row">
                    <div class="col-2 mt-3">
                        Mail
                    </div>
                    <div class="col-8 mt-3">
                        <input class="form-control" type="text" name="mailResponsable" id="mailResponsable" value="">
                    </div>
                </div>

                <div class="row">
                    <div class="col-2 mt-3">
                        Teléfono
                    </div>
                    <div class="col-8 mt-3">
                        <input class="form-control" type="text" name="telResponsable" id="telResponsable" value="">
                    </div>
                </div>

                <div class="row">
                    <div class="col-2 mt-3">
                        Tipo de Asignación
                    </div>
                    <div class="col-8 mt-3">
                        <select class="form-control" name="tipoAsignacionResponsable" id="tipoAsignacionResponsable">
                            <option value="" id_asignacion="" selected>Tipo de asignación</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-2 mt-3">
                        Numero de Asignación
                    </div>
                    <div class="col-8 mt-3">
                        <input class="form-control" type="text" name="nroAsignacionResponsable" id="nroAsignacionResponsable" value="">
                    </div>
                </div>

                <div class="row">
                    <div class="col-2 mt-3">
                        Año de Asignación
                    </div>
                    <div class="col-8 mt-3">
                        <input class="form-control" type="text" name="anioAsignacionResponsable" id="anioAsignacionResponsable" value="">
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
