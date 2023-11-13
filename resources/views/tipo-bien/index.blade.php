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
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                  </tr>
                </tbody>
              </table>
        </div>
    </div>
</div>


@endsection
@push('scripts')
@endpush
