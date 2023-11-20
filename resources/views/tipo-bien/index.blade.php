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
        <div class="col">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">parent_id</th>
                  <th scope="col">codigo_presup</th>
                  <th scope="col">tipo_bien</th>
                  <th scope="col">descripcion_bien</th>
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
