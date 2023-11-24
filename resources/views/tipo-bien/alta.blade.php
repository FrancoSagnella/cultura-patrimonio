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
            <form action="/patrimonio" method="post" enctype="multipart/form-data">
            @csrf
                <div class="row mt-3 mb-3">
                    <div class="col-lg-12 py-3 px-5">
                        <div class="py-3 px-3 borde-celeste">

                        </div>

                        <div class="row justify-content-center my-3">
                            <div class="col-lg-4 text-center">
                                <a class="btn btn-danger btn-block botones-redondos mx-2" href="">Cancelar</a>
                                <button type="submit" class="btn btn-success btn-block botones-redondos mx-2">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>                               
        </div>
    </div>
</div>


@endsection
@push('scripts')
<script src="{{asset('js/selectTipoBien.js')}}"></script>
@endpush
