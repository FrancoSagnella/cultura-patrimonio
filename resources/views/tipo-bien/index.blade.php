@extends('index')
@push('styles')
@endpush
@section('content')
<div class="container-fluid py-3 contenedor-gris-redondeado">

    <div class="row justify-content-center mt-3">
        <div class="col-md-4 titulo-redondeado-celeste">
            <div class="row text-center">
                <h1>Tipos de Bien</h1>
            </div>
        </div>
    </div>

    <div class="row mt-3 mb-3">
        <div class="panel-body contenedor contenedor-tablas mb-4">
            <table class="table-responsive cultura-table">
              <thead>
                <tr>
                  <th scope="col"><label class="d-flex justify-content-center">id</label></th>
                  <th scope="col"><label class="d-flex justify-content-center">parent_id</label></th>
                  <th scope="col"><label class="d-flex justify-content-center">codigo_presup</label></th>
                  <th scope="col"><label class="d-flex justify-content-center">tipo_bien</label></th>
                  <th scope="col"><label class="d-flex justify-content-center">descripcion_bien</label></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($tiposBien as $tipoBien)
                <tr>
                  <td class="text-center">{{$tipoBien->id}}</td>
                  <td class="text-center">{{$tipoBien->parent_id ? $tipoBien->parent_id : '-'   }}</td>
                  <td class="text-center">{{$tipoBien->codigo_presup}}</td>
                  <td>{{$tipoBien->tipo_bien}}</td>
                  <td>{{$tipoBien->descripcion_bien}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="container row">
            {{ $tiposBien->links() }}
          </div>
    </div>
</div>
@endsection
@push('scripts')
@endpush
