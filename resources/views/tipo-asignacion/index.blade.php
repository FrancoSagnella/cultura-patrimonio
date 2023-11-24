@extends('index')
@push('styles')
@endpush
@section('content')

<div class="container-fluid py-3 contenedor-gris-redondeado">

    <div class="row justify-content-center mt-3">
        <div class="col-md-4 titulo-redondeado-celeste">
            <div class="row text-center">
                <h1>Tipos de Asignación</h1>
            </div>
        </div>
    </div>

    <div class="row mt-3 mb-3">
        <div class="col">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Asignación</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">
                        <button onclick="mostrarFormAlta('tipos-asignacion')" type="button" class="btn btn-success botones-redondos" data-bs-toggle="modal" data-bs-target="#Modal">
                            Nuevo Tipo de Asignación
                        </button>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($tiposAsignacion as $asignacion)
                      <tr>
                        <th> {{ $asignacion->id }} </th>
                        <td> {{ $asignacion->tipo_asignacion }} </td>
                        <td> {{ $asignacion->descripcion }} </td>
                        <td>
                                <button onclick="mostrarFormEditarTipoAsignacion({{ $asignacion->id }})" type="button" class="btn btn-primary botones-redondos" data-bs-toggle="modal" data-bs-target="#Modal">
                                    Editar
                                </button>
                                @if(!$asignacion->habilitado)
                                    <button onclick="habilitarTipoAsignacion({{ $asignacion->id }})" type="button" class="btn btn-success botones-redondos" >
                                        Habilitar
                                    </button>
                                @else
                                    <button onclick="deshabilitarTipoAsignacion({{ $asignacion->id }})" type="button" class="btn btn-danger botones-redondos" >
                                        Deshabilitar
                                    </button>
                                @endif
                            </td>
                      </tr>
                  @endforeach
                  </tbody>
              </table>
        </div>
    </div>
</div>

<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel">Alta de Tipo de Asignación</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="modal-body">
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
</div>

@endsection
@push('scripts')
<script src="{{asset('js/utils.js')}}"></script>
@endpush
