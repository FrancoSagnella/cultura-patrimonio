@extends('index')
@push('styles')
@endpush
@section('content')

<div class="container-fluid py-3 contenedor-gris-redondeado">

    <div class="row justify-content-center mt-3">
        <div class="col-md-4 titulo-redondeado-celeste">
            <div class="row text-center">
                <h1>Tipos de Ingreso</h1>
            </div>
        </div>
    </div>

    <div class="row mt-3 mb-3">
        <div class="col">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Ingreso</th>
                    <th scope="col">
                        <button onclick="mostrarFormAltaTipoIngreso()" type="button" class="btn btn-success botones-redondos" data-bs-toggle="modal" data-bs-target="#Modal">
                            Nuevo Tipo de Ingreso
                        </button>
                    </th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($tiposIngreso as $ingreso)
                        <tr>
                            <td>{{ $ingreso->id }}</td>
                            <td>{{ $ingreso->ingreso }}</td>
                            <td>
                                <button onclick="mostrarFormEditarTipoIngreso({{ $ingreso->id }})" type="button" class="btn btn-primary botones-redondos" data-bs-toggle="modal" data-bs-target="#Modal">
                                    Editar
                                </button>
                                @if(!$ingreso->habilitado)
                                    <button onclick="habilitarTipoIngreso({{ $ingreso->id }})" type="button" class="btn btn-success botones-redondos" >
                                        Habilitar
                                    </button>
                                @else
                                    <button onclick="deshabilitarTipoIngreso({{ $ingreso->id }})" type="button" class="btn btn-danger botones-redondos" >
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
          <h5 class="modal-title" id="ModalLabel">Alta de Tipo de Ingreso</h5>
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
<script src="{{asset('js/tipo-ingreso/utils.js')}}"></script>
@endpush
