@extends('index')
@push('styles')
@endpush
@section('content')

<div class="container-fluid py-3 contenedor-gris-redondeado">

    <div class="row justify-content-center mt-3">
        <!-- <div class="col-md-4 titulo-redondeado-celeste">
            <div class="row text-center">
                <h1>Listado Patrimonial</h1>
            </div>
        </div> -->
    </div>
    <div class="row justify-content-center mt-3">
        <h4>Filtrar contenido</h4>
    </div>
    <div class="row card-patrimonial">
        <div class="col card-filtros ">
            <div class="row px-4">
                <div class="col-3 px-5 mt-2"> Nº Patrimonio:
                </div>
                <div class="col-3 px-5 mt-2"> Complejo/Edificio:
                </div>
                <div class="col-3 px-5 mt-2"> Dependencia:
                </div>
                <div class="col-3 px-5 mt-2"> Código Presupuestario:
                </div>
            </div>
    
            <div class="row  px-4">
                <div class="col-3 px-5 mt-2">
                    <input class="form-control" type="text" name="num_patrimonio" id="num_patrimonio">
                </div>
                <div class="col-3 px-5 mt-2 ">
                    <select class="form-control" name="complejo_edificio" id="complejo_edificio">
                        <option value="default" selected>Seleccione un complejo/edificio</option>
                    </select>
                </div>
                <div class="col-3 px-5 mt-2 ">
                    <select class="form-control" name="dependencia" id="dependencia">
                        <option value="default" selected>Seleccione una dependencia</option>
                    </select>
                </div>
                <div class="col-3 px-5 mt-2 ">
                    <input class="form-control" type="text" name="cod_presupuestario" id="cod_presupuestario">
                </div>
            </div>
    
    
    
            <div class="row px-4">
                <div class="col-3 px-5"> Descripción Patrimonio:
                </div>
                <div class="col-3 px-5"> Unidad Funcional:
                </div>
                <div class="col-3 px-5"> Responsable:
                </div>
                <div class="col-3 px-5"> Tipo de Bien:
                </div>
            </div>
    
            <div class="row px-4">
                <div class="col-3 px-5">
                    <input class="form-control" type="text" name="descripcion" id="descripcion">
                </div>
                <div class="col-3 px-5">
                    <select class="form-control" name="unidad" id="unidad">
                        <option value="default" selected>Seleccione una unidad funcional</option>
                    </select>
                </div>
                <div class="col-3 px-5">
                    <select class="form-control" name="responsable" id="responsable">
                        <option value="default" selected>Seleccione un responsable</option>
                    </select>
                </div>
                <div class="col-3 px-5">
                    <select class="form-control" name="tipo_bien" id="tipo_bien">
                        <option value="default" selected>Seleccione un tipo de bien</option>
                    </select>
                </div>
            </div>
    
            <div class="row px-4">
                <div class="col-3 px-5"> Fecha desde:
                </div>
                <div class="col-3 px-5"> Piso:
                </div>
                <div class="col-3 px-5"> Estado:
                </div>
            </div>
    
            <div class="row px-4">
                <div class="col-3 px-5">
                    <input class="form-control" type="date" name="fecha_desde" id="fecha_desde">
                </div>
                <div class="col-3 px-5">
                    <select class="form-control" name="piso" id="piso">
                        <option value="default" selected>Seleccione un piso</option>
                    </select>
                </div>
                <div class="col-3 px-5">
                    <select class="form-control" name="estado" id="estado">
                        <option value="default" selected>Seleccione un estado</option>
                    </select>
                </div>
            </div>
    
            <div class="row px-4">
                <div class="col-3 px-5"> Fecha hasta:
                </div>
                <div class="col-3 px-5"> Oficina:
                </div>
            </div>
    
            <div class="row px-4">
                <div class="col-3 px-5">
                    <input class="form-control" type="date" name="fecha_hasta" id="fecha_hasta">
                </div>
                <div class="col-3 px-5">
                    <select class="form-control" name="oficina" id="oficina">
                        <option value="default" selected>Seleccione una oficina</option>
                    </select>
                </div>
                
            </div>

            <div class="row px-4">
            <div class="col-5 offset-5 mt-2">
                    <button type="button" class="btn btn-danger botones-redondos">
                        Limpiar
                    </button>
                    <button type="button" class="btn btn-success botones-redondos">
                        Filtrar
                    </button>
                </div>
            </div>

        </div>
    </div>


    <div class="row mt-3 mb-3">
        <div class="panel-body contenedor contenedor-tablas  d-flex justify-content-center mb-4">
            <table class="table-responsive cultura-table">
                <thead>
                  <tr>
                    <th scope="col">Nº Patrimonio</th>
                    <th scope="col">Dependencia</th>
                    <th scope="col">Código</th>
                    <th scope="col">Detalle</th>
                    <th scope="col">Responsable</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Fecha de Alta</th>

                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
        </div>
    </div>
</div>



@endsection
