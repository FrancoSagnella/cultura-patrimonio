@extends('index')
@push('styles')
<style>
    /*estilos para achicar botones paginados */
    .w-5{
    width: 20px;
    }
    .h-5 {
    height: 20px;
    }
</style>
@endpush
@section('content')
<div class="container-fluid py-3 contenedor-gris-redondeado">

    <div class="row justify-content-center mt-3">
        <div class="col-md-4 titulo-redondeado-celeste">
            <div class="row text-center">
                <h1>Responsables</h1>
            </div>
        </div>
    </div>

    <div class="row mt-3 mb-3">
      <div class="panel-body contenedor contenedor-tablas mb-4">
        <table class="table-responsive cultura-table">
              <thead>
                <tr>
                  <th scope="col"><label class="d-flex justify-content-center">id</label></th>
                  <th scope="col"><label class="d-flex justify-content-center">Nombre</label></th>
                  <th scope="col"><label class="d-flex justify-content-center">Apellido</label></th>
                  <th scope="col"><label class="d-flex justify-content-center">DNI</label></th>
                  <th scope="col"><label class="d-flex justify-content-center">Teléfono</label></th>
                  <th scope="col"><label class="d-flex justify-content-center">Email</label></th>
                  <th scope="col"><label class="d-flex justify-content-center">Numero Asignación</label></th>
                  <th scope="col"><label class="d-flex justify-content-center">Año Asiganción</label></th>
                  <th scope="col"><label class="d-flex justify-content-center">Tipo Asiganción</label></th>
                  <th scope="col"><label class="d-flex justify-content-center">Tipo Responsable</label></th>
                  <th scope="col"><label class="d-flex justify-content-center">Descripción</label></th>
                  <th scope="col"><label class="d-flex justify-content-center">Estado</label></th>
                  <th scope="col">
                    <button onclick="mostrarFormAlta('responsables')" type="button" class="btn btn-success botones-redondos" data-bs-toggle="modal" data-bs-target="#Modal">
                        Nuevo Responsable
                    </button>
                  </th>
                  {{-- <th scope="col">tipo_bien</th>
                  <th scope="col">descripcion_bien</th> --}}
                </tr>
              </thead>
              <tbody>
                @foreach ($responsables as $responsable)
                <tr>
                    <td class="text-center">{{$responsable->id}}</td>
                    <td>{{$responsable->nom}}</td>
                    <td>{{$responsable->ape}}</td>
                    <td>{{$responsable->dni}}</td>
                    <td>{{$responsable->tel}}</td>
                    <td>{{$responsable->mail}}</td>
                    <td>{{$responsable->desc_asign}}</td>
                    <td>{{$responsable->nro_asig}}</td>
                    <td>{{$responsable->anio_asig}}</td>
                    <td>{{$responsable->desc_tipo_resp}}</td>
                    <td>{{$responsable->text}}</td>
                    <td>{{$responsable->del}}</td>

                    {{-- <td class="text-center">{{$tipoBien->parent_id ? $tipoBien->parent_id : '-'   }}</td>
                    <td class="text-center">{{$tipoBien->codigo_presup}}</td> --}}
                    <td>
                        <button onclick="mostrarFormEditar('responsables', {{ $responsable->id }})" type="button" class="btn btn-primary botones-redondos" data-bs-toggle="modal" data-bs-target="#Modal">
                            Editar
                        </button>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="container row">
            {{ $responsables->links() }}
          </div>
    </div>
</div>
<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel">Alta Responsable</h5>
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