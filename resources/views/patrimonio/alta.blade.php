@extends('index')
@push('styles')
@endpush
@section('content')

<div class="container-fluid py-3 contenedor-gris-redondeado">

    <div class="row justify-content-center mt-3">
        <div class="col-md-4 titulo-redondeado-celeste">
            <div class="row text-center">
                <h1>Alta Patrimonial</h1>
            </div>
        </div>
    </div>

    <form action="/patrimonio" method="post" enctype="multipart/form-data">
    @csrf
        <div class="row mt-3 mb-3">

            <div class="col-lg-6 py-3 px-5">
                <div class="py-3 px-3 borde-celeste">

                    {{-- Cantidad de altas imput --}}
                    <div class="row">
                        <div class="col-lg-2 mt-3">
                            Cantidad de altas
                        </div>
                        <div class="col-lg-8 mt-3">
                            <input class="form-control" type="number" value="{{ old('cantAltas') ?? 1 }}" id="cantAltas" name="cantAltas" onchange="cantidadAltasNoMenorAUno()">
                        </div>
                    </div>


                    {{-- Dependencias Input --}}
                    <div class="row">
                        <div id="dependencias" class="col-lg-12">
                            <div id="select-dependencias-0" class="row">
                                <div class="col-lg-2 mt-3">
                                    Dependencias
                                </div>
                                <div class="col-lg-8 mt-3">
                                    <select class="form-control" name="dependencia-padre" id="dependencia-padre" onchange="seleccionarDependencia('dependencia-padre', 0, 'dependencia-hija-1', 1)">
                                        <option value="default" selected>Seleccione una Dependencia</option>
                                        @foreach ($dependencias as $item)
                                            @if(is_null($item->parent_id))
                                                <option {{ old('dependencia-padre') == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->nombre_dependencia}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-2"></div>
                            </div>
                        </div>
                        {{-- Inpout hide para guardar la ultima dependencia seleccionada, si no se selecciona
                            dependencia d mas bajo nivel, tiene valor deafault 'sinSeleccion' --}}
                        <input type="hidden" id="dependencia-final-seleccionada" name="dependencia-final-seleccionada" value="{{ old('dependencia-final-seleccionada') ?? 'sinSeleccion' }}">
                    </div>

                    <div class="row" id="dependencia-seleccionada" style="display: none">
                        {{-- Direccion de la dependencia --}}
                        <div class="col-lg-2 mt-3">
                            Direccion
                        </div>
                        <div class="col-lg-3 mt-3">
                            <input class="form-control" type="text" value="{{ old('direccion-dependencia') ?? 'default' }}" id="direccion-dependencia" disabled>
                        </div>
                        {{-- Ubicacion Real de la dependencia --}}
                        <div class="col-lg-2 mt-3 text-center">
                            Ubicacion Real
                        </div>
                        <div class="col-lg-3 mt-3">
                            <input class="form-control" type="text" value="{{ old('ubicacionReal') ?? 'default' }}"  name="ubicacionReal" id="ubicacionReal">
                        </div>
                        <div class="col-lg-1"></div>


                        {{-- No se que es esto --}}
                        <div class="col-lg-2 mt-3">
                            Responsable
                        </div>
                        <div class="col-lg-8 mt-3">
                            <select class="form-control" name="responsable" id="responsable">
                            </select>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>




                    {{-- Tipo de Bien Input --}}
                    <div class="row">
                        <div id="bienes" class="col-lg-12">
                            <div id="select-bienes-0" class="row">
                                <div class=" col-lg-2 mt-3">
                                    Tipo de Bien
                                </div>
                                <div class="col-lg-8 mt-3">
                                    <select class="form-control" name="bien-padre" id="bien-padre" onchange="seleccionarBien('bien-padre', 0, 'bien-hija-1', 1)">
                                        <option value="default" selected>Seleccione un Tipo de Bien</option>
                                        @foreach ($tipos_bien as $item)
                                            @if(is_null($item->parent_id))
                                                <option value="{{$item->id}}">{{$item->codigo_presup}} - {{$item->tipo_bien}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-2"></div>
                            </div>
                        </div>
                        {{-- Inpout hide para guardar la ultima dependencia seleccionada, si no se selecciona
                            dependencia d mas bajo nivel, tiene valor deafault 'sinSeleccion' --}}
                            <input type="hidden" id="tipobien-final-seleccionado" name="tipobien-final-seleccionado" value="sinSeleccion">
                    </div>




                    {{-- Usuario Responsable Input --}}
                    <div class="row" id="usuario-responsable" style="display: none">
                        <div class=" col-lg-2 mt-3">
                            Usuario Responsable
                        </div>
                        <div class="col-lg-8 mt-3">
                            <input class="form-control" type="text" name="usuarioResponsable" id="usuarioResponsable">
                        </div>
                        <div class="col-lg-2"></div>
                    </div>


                    {{-- Nro de Serie Input --}}
                    <div class="row"  id="seccion-nro-serie" style="display: none">
                        <div class=" col-lg-2 mt-3">
                            Numero de Serie
                        </div>
                        <div class="col-lg-2 mt-3">
                            <input class="form-control" value="{{ old('nroSerie') ?? 'default' }}" type="text" name="nroSerie">
                        </div>
                        <div class="col-lg-1 mt-3 text-center">
                            Marca
                        </div>
                        <div class="col-lg-2 mt-3">
                            <input class="form-control" value="{{ old('marca') ?? 'default' }}" type="text" name="marca">
                        </div>
                        <div class="col-lg-1 mt-3 text-center">
                            Modelo
                        </div>
                        <div class="col-lg-2 mt-3">
                            <input class="form-control" value="{{ old('modelo') ?? 'default' }}" type="text" name="modelo">
                        </div>
                        <div class="col-lg-1"></div>
                    </div>



                    {{-- Tipo de Ingreso Input --}}
                    <div class="row">
                        <div class=" col-lg-2 mt-3">
                            Tipo de Ingreso
                        </div>
                        <div class="col-lg-8 mt-3">
                            <select class="form-control" name="tipoIngreso">
                                <option value="default" selected>Seleccione un Tipo de Ingreso</option>
                                @foreach ($tipos_ingreso as $item)
                                    <option {{ old('tipoIngreso') == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->ingreso}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>




                    {{-- Universo Input --}}
                    <div class="row">
                        <div class=" col-lg-2 mt-3">
                            Estado
                        </div>
                        <div class="col-lg-8 mt-3">
                            <select class="form-control" name="estado">
                                <option value="default" selected>Seleccione un Estado</option>
                                @foreach ($universos as $item)
                                    <option {{ old('tipoIngreso') == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->universo}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>





                    {{-- Proveedor Input (esto va a cambiar) --}}
                    <div class="row">
                        <div class=" col-lg-2 mt-3">
                            Proveedor
                        </div>
                        <div class="col-lg-8 mt-3">
                            <select class="form-control" name="proveedor">
                                <option value="default" selected>Seleccione un Proveedor</option>
                                @foreach ($proveedores as $item)
                                    <option {{ old('tipoIngreso') == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->nombre_proveedor}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
            </div>



            <div class="col-lg-6 px-5 py-3">
                <div class="py-3 px-3 borde-celeste">

                    {{-- Orden de Compra Input --}}
                    <div class="row">
                        <div class=" col-lg-2 mt-3">
                            Orden de Compra
                        </div>
                        <div class="col-lg-8 mt-3">
                            <input class="form-control" value="{{ old('ordenCompra') }}" type="text" name="ordenCompra">
                        </div>
                        <div class="col-lg-2"></div>
                    </div>

                    {{-- Fecha Orden de Compra Input --}}
                    <div class="row">
                        <div class=" col-lg-2 mt-3">
                            Fecha de Orden
                        </div>
                        <div class="col-lg-8 mt-3">
                            <input class="form-control" value="{{ old('fechaOrden') }}" type="date" name="fechaOrden">
                        </div>
                        <div class="col-lg-2"></div>
                    </div>

                    {{-- Nro Expediente Input --}}
                    <div class="row">
                        <div class=" col-lg-2 mt-3">
                            Numero de Expediente
                        </div>
                        <div class="col-lg-3 mt-3">
                            <input class="form-control" value="{{ old('nroExpediente') }}" type="text" name="nroExpediente">
                        </div>
                        <div class="col-lg-2 mt-4 text-center">
                            Numero de CCOO
                        </div>
                        <div class="col-lg-3 mt-3">
                            <input class="form-control" value="{{ old('nroCCOO') }}" type="text" name="nroCCOO">
                        </div>
                        <div class="col-lg-1"></div>
                    </div>



                    {{-- Nro de Factura Input --}}
                    <div class="row">
                        <div class=" col-lg-2 mt-3">
                            Numero de Factura
                        </div>
                        <div class="col-lg-8 mt-3">
                            <input class="form-control" value="{{ old('nroFactura') }}" type="text" name="nroFactura">
                        </div>
                        <div class="col-lg-2"></div>
                    </div>




                    {{-- Fecha de Factura Input --}}
                    <div class="row">
                        <div class=" col-lg-2 mt-3">
                            Fecha de Factura
                        </div>
                        <div class="col-lg-8 mt-3">
                            <input class="form-control" value="{{ old('fechaFactura') }}" type="date" name="fechaFactura">
                        </div>
                        <div class="col-lg-2"></div>
                    </div>




                    {{-- Remito Input --}}
                    <div class="row">
                        <div class=" col-lg-2 mt-3">
                            Remito
                        </div>
                        <div class="col-lg-8 mt-3">
                            <input class="form-control" value="{{ old('remito') }}" type="text" name="remito">
                        </div>
                        <div class="col-lg-2"></div>
                    </div>




                    {{-- Importe Input --}}
                    <div class="row">
                        <div class=" col-lg-2 mt-3">
                            Importe
                        </div>
                        <div class="col-lg-8 mt-3">
                            <input class="form-control" value="{{ old('importe') }}" type="text" name="importe">
                        </div>
                        <div class="col-lg-2"></div>
                    </div>



                    {{-- Descripcion Input --}}
                    <div class="row">
                        <div class=" col-lg-2 mt-3">
                            Descripcion
                        </div>
                        <div class="col-lg-8 mt-3">
                            {{-- <input class="form-control" type="text" name="descripcion"> --}}
                            <textarea name="descripcion" value="{{ old('nroSerie') }}" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>




                    {{-- Imagen Input --}}
                    <div class="row">
                        <div class="  col-lg-2 mt-3">
                            Imagen del Bien
                        </div>
                        <div class="col-lg-8 mt-3">
                            <input class="form-control" type="file" name="imgBien">
                        </div>
                        <div class="col-lg-2"></div>
                    </div>


                </div>
            </div>



        </div>

        <div class="row justify-content-center my-3">
            <div class="col-lg-4 text-center">
                <a class="btn btn-danger btn-block botones-redondos mx-2" href="">Cancelar</a>
                <button type="submit" class="btn btn-success btn-block botones-redondos mx-2">Guardar</button>
            </div>
        </div>

    </form>
</div>

@endsection
@push('scripts')
    <script>
        const dependencias = @json($dependencias);
        const tipos_bien = @json($tipos_bien);
        const responsables = @json($responsables);
        const valoresAnterioresDependencia = @json(old('dependencia-hija'));

        //Para que cantidad de altas no pueda ser menor a 1
        const cantidadAltasNoMenorAUno = () => {
            if ($("#cantAltas").val() < 1) {
                $("#cantAltas").val(1);
            }
        }

    </script>
    <script src="{{asset('js/selectDependencias.js')}}"></script>
    <script src="{{asset('js/selectBienes.js')}}"></script>
@endpush
