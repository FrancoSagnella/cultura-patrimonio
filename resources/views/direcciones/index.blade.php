@extends('index')
@push('styles')
@endpush
@section('content')

<div class="container-fluid py-3 contenedor-gris-redondeado">

    <div class="row justify-content-center mt-3">
        <div class="col-md-4 titulo-redondeado-celeste">
            <div class="row text-center">
                <h1>Direcciones</h1>
            </div>
        </div>
    </div>

    <div class="row mt-3 mb-3">
        <div class="panel-body contenedor contenedor-tablas mb-4">
            <table class="table-responsive cultura-table">
                <thead>
                  <tr>
                    <th scope="col">Provincia</th>
                    <th scope="col">Localidad</th>
                    <th scope="col">Codigo Postal</th>
                    <th scope="col">Calle</th>
                    <th scope="col">Numero</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">
                        <button onclick="mostrarFormAlta('direcciones')" type="button" class="btn btn-success botones-redondos" data-bs-toggle="modal" data-bs-target="#Modal">
                            Nueva Direccion
                        </button>
                    </th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($direcciones as $direccion)
                        <tr>
                            <td>{{ $direccion->descr_prov }}</td>
                            <td>{{ $direccion->descr_loc }}</td>
                            <td>{{ $direccion->cp }}</td>
                            <td>{{ $direccion->calle }}</td>
                            <td>{{ $direccion->nro }}</td>
                            <td>{{ $direccion->tel }}</td>
                            <td>
                                <button onclick="mostrarFormEditar('direcciones', {{ $direccion->id }})" type="button" class="btn btn-primary botones-redondos" data-bs-toggle="modal" data-bs-target="#Modal">
                                    Editar
                                </button>
                                @if(!$direccion->del)
                                    <button onclick="habilitar('direcciones', {{ $direccion->id }})" type="button" class="btn btn-success botones-redondos" >
                                        Habilitar
                                    </button>
                                @else
                                    <button onclick="deshabilitar('direcciones', {{ $direccion->id }})" type="button" class="btn btn-danger botones-redondos" >
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
          <h5 class="modal-title" id="ModalLabel">Alta de Direcciones</h5>
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
