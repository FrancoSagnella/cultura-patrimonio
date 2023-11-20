@extends('index')
@push('styles')
@endpush
@section('content')
<div class="container-fluid py-3 contenedor-gris-redondeado">

    <div class="row justify-content-center mt-3">
        <div class="col-md-4 titulo-redondeado-celeste">
            <div class="row text-center">
                <h1>Proveedores</h1>
            </div>
        </div>
    </div>

    <div class="row mt-3 mb-3">
        <div class="col">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">nombre_proveedor</th>
                  <th scope="col">descripcion_proveedor</th>
                  {{-- <th scope="col">tipo_bien</th>
                  <th scope="col">descripcion_bien</th> --}}
                </tr>
              </thead>
              <tbody>
                @foreach ($proveedores as $proveedor)
                <tr>
                  <td class="text-center">{{$proveedor->id}}</td>
                  <td>{{$proveedor->nombre_proveedor}}</td>
                  <td>{{$proveedor->descripcion_proveedor}}</td>
                  {{-- <td class="text-center">{{$tipoBien->parent_id ? $tipoBien->parent_id : '-'   }}</td>
                  <td class="text-center">{{$tipoBien->codigo_presup}}</td> --}}
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="container row">
            {{ $proveedor->links() }}
          </div>
    </div>
</div>
@endsection
@push('scripts')
@endpush
