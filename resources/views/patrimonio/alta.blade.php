@extends('home')
@push('styles')
@endpush
@section('content')

<div class="container">

    <div class="row mt-3 mb-3">

        <form action="/patrimonio" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-lg-12">
                <div class="row text-center">
                    <h2>Nuevo Patrimonio</h2>
                </div>
            </div>

            <div class="offset-lg-1 col-lg-11">
                <div class="row text-start mt-4">

                    {{-- Cantidad de altas imput --}}
                    <div class="col-lg-2 mt-3">
                        Cantidad de altas
                    </div>
                    <div class="col-lg-8 mt-3">
                        <input class="form-control" type="text" name="cantAltas" disabled>
                    </div>
                    <div class="col-lg-2"></div>



                    {{-- Dependencias Input --}}
                    <div class="col-lg-2 mt-3">
                        Dependencias
                    </div>
                    <div class="col-lg-8 mt-3">
                        <select class="form-control" name="dependencias">
                            @foreach ($dependencias as $item)
                                <option value="{{$item->id}}">{{$item->nombre_dependencia}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-2"></div>


                    {{-- No se que es esto --}}
                    <div class="col-lg-12 mt-3">
                        Responsable
                    </div>



                    {{-- Tipo de Bien Input --}}
                    <div class=" col-lg-2 mt-3">
                        Tipo de Bien
                    </div>
                    <div class="col-lg-8 mt-3">
                        <select class="form-control" name="tipoBien">
                            @foreach ($tipos_bien as $item)
                                <option value="{{$item->id}}">{{$item->tipo_bien}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-2"></div>



                    {{-- Proveedor Input (esto va a cambiar) --}}
                    <div class=" col-lg-2 mt-3">
                        Proveedor
                    </div>
                    <div class="col-lg-8 mt-3">
                        <select class="form-control" name="proveedor">
                            @foreach ($proveedores as $item)
                                <option value="{{$item->id}}">{{$item->nombre_proveedor}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-2"></div>



                    {{-- Tipo de Ingreso Input --}}
                    <div class=" col-lg-2 mt-3">
                        Tipo de Ingreso
                    </div>
                    <div class="col-lg-8 mt-3">
                        <select class="form-control" name="tipoIngreso">
                            @foreach ($tipos_ingreso as $item)
                                <option value="{{$item->id}}">{{$item->ingreso}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-2"></div>




                    {{-- Universo Input --}}
                    <div class=" col-lg-2 mt-3">
                        Estado
                    </div>
                    <div class="col-lg-8 mt-3">
                        <select class="form-control" name="estado">
                            @foreach ($universos as $item)
                                <option value="{{$item->id}}">{{$item->universo}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-2"></div>




                    {{-- Orden de Compra Input --}}
                    <div class=" col-lg-2 mt-3">
                        Orden de Compra
                    </div>
                    <div class="col-lg-8 mt-3">
                        <input class="form-control" type="text" name="ordenCompra">
                    </div>
                    <div class="col-lg-2"></div>




                    {{-- Fecha Orden de Compra Input --}}
                    <div class=" col-lg-2 mt-3">
                        Fecha de Orden
                    </div>
                    <div class="col-lg-8 mt-3">
                        <input class="form-control" type="text" name="fechaOrden">
                    </div>
                    <div class="col-lg-2"></div>





                    {{-- Nro Expediente Input --}}
                    <div class=" col-lg-2 mt-3">
                        Numero de Expediente
                    </div>
                    <div class="col-lg-8 mt-3">
                        <input class="form-control" type="text" name="nroExpediente">
                    </div>
                    <div class="col-lg-2"></div>




                    {{-- Nro de Factura Input --}}
                    <div class=" col-lg-2 mt-3">
                        Numero de Factura
                    </div>
                    <div class="col-lg-8 mt-3">
                        <input class="form-control" type="text" name="nroFactura">
                    </div>
                    <div class="col-lg-2"></div>




                    {{-- Fecha de Factura Input --}}
                    <div class=" col-lg-2 mt-3">
                        Fecha de Factura
                    </div>
                    <div class="col-lg-8 mt-3">
                        <input class="form-control" type="text" name="fechaFactura">
                    </div>
                    <div class="col-lg-2"></div>




                    {{-- Importe Input --}}
                    <div class=" col-lg-2 mt-3">
                        Importe
                    </div>
                    <div class="col-lg-8 mt-3">
                        <input class="form-control" type="text" name="importe">
                    </div>
                    <div class="col-lg-2"></div>




                    {{-- Nro de Serie Input --}}
                    <div class=" col-lg-2 mt-3">
                        Numero de Serie
                    </div>
                    <div class="col-lg-8 mt-3">
                        <input class="form-control" type="text" name="nroSerie">
                    </div>
                    <div class="col-lg-2"></div>





                    {{-- Descripcion Input --}}
                    <div class=" col-lg-2 mt-3">
                        Descripcion
                    </div>
                    <div class="col-lg-8 mt-3">
                        {{-- <input class="form-control" type="text" name="descripcion"> --}}
                        <textarea name="descripcion" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    <div class="col-lg-2"></div>




                    {{-- Imagen Input --}}
                    <div class="  col-lg-2 mt-3">
                        Imagen del Bien
                    </div>
                    <div class="col-lg-8 mt-3">
                        <input class="form-control" type="text" name="imgBien">
                    </div>
                    <div class="col-lg-2"></div>


                    <div class="col-lg-11 mt-4 text-center">
                        <a class="btn btn-danger btn-block" href="">Cancelar</a>
                        <button type="submit" class="btn btn-success btn-block">Guardar</button>
                    </div>
                </div>


                <div class="text-right">

                </div>

            </div>
        </form>
    </div>
</div>

@endsection
