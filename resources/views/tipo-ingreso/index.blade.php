@extends('index')
@push('styles')
@endpush
@section('content')

<div class="container-fluid py-3 contenedor-gris-redondeado">

    <div class="row justify-content-center mt-3">
        <div class="col-md-4 titulo-redondeado-celeste">
            <div class="row text-center">
                <h1>Tipos de Ingreso</h1>
                {{-- <button onclick="altaTipoIngreso()">Alta</button> --}}
                <button onclick="altaTipoIngreso()" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Launch demo modal
                </button>

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
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($tiposIngreso as $ingreso)
                        <tr>
                            <td>{{ $ingreso->id }}</td>
                            <td>{{ $ingreso->ingreso }}</td>
                            <td>Editar / Deshabilitar</td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
</div>

@endsection
@push('scripts')
<script src="{{asset('js/tipo-ingreso/utils.js')}}"></script>
@endpush
