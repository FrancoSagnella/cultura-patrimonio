@extends('index')
@push('styles')
@endpush
@section('content')

<div class="container-fluid py-3 contenedor-gris-redondeado">

    <div class="row justify-content-center mt-3">
        <div class="col-md-4 titulo-redondeado-celeste">
            <div class="row text-center">
                <h1>Ubicaciones</h1>
            </div>
        </div>
    </div>

    <div class="row mt-3 mb-3">
        <div class="col">

              <div id="tabla" class="container-fluid">
                <div id="tabla-header" class="row bg-info">
                    <div class="col-1"></div>
                    <div class="col">Nombre</div>
                    <div class="col">Direccion</div>
                    <div class="col">Dependencia</div>
                    <div class="col">Responsable</div>
                    <div class="col">
                        <button onclick="mostrarFormAlta('complejos')" type="button" class="btn btn-success botones-redondos" data-bs-toggle="modal" data-bs-target="#Modal">
                            Nuevo Complejo/Edificio
                        </button>
                    </div>
                </div>
                <div id="tabla-body" class="">
                    @foreach ($complejos as $com)
                        <div class="row bg-light" >
                            <div class="col-1" data-bs-toggle="collapse" data-bs-target="#r{{ $com['complejo']->id }}">+</div>
                            <div class="col">{{ $com['complejo']->nom }}</div>
                            <div class="col">Direccion</div>
                            <div class="col">Dependencia</div>
                            <div class="col">Responsable</div>
                            <div class="col">
                                <button onclick="mostrarFormEditar('complejos', $piso['piso']->id)" type="button" class="btn btn-primary botones-redondos" data-bs-toggle="modal" data-bs-target="#Modal">
                                    Editar
                                </button>
                                <button onclick="mostrarFormAlta('unidades-funcionales')" type="button" class="btn btn-primary botones-redondos" data-bs-toggle="modal" data-bs-target="#Modal">
                                    Agregar Unidad Funcional
                                </button>
                            </div>
                        </div>

                        <div class="collapse" id="r{{ $com['complejo']->id }}">
                            <div class="">
                                @foreach ($com['uf'] as $uf)
                                    <div class="row">
                                        <div class="col-1" data-bs-toggle="collapse" data-bs-target="#uf{{ $uf['uf']->id }}">+</div>
                                        <div class="col">{{ $uf['uf']->nom }}</div>
                                        <div class="col">
                                            <button onclick="mostrarFormEditar('unidades-funcionales', $piso['piso']->id)" type="button" class="btn btn-primary botones-redondos" data-bs-toggle="modal" data-bs-target="#Modal">
                                                Editar
                                            </button>
                                            <button onclick="mostrarFormAlta('pisos')" type="button" class="btn btn-primary botones-redondos" data-bs-toggle="modal" data-bs-target="#Modal">
                                                Agregar Piso
                                            </button>
                                        </div>
                                    </div>

                                    <div class="collapse" id="uf{{ $uf['uf']->id }}">
                                        <div class="">
                                            @foreach ($uf['piso'] as $piso)
                                                <div class="row bg-light">
                                                    <div class="col-1" data-bs-toggle="collapse" data-bs-target="#piso{{ $piso['piso']->piso }}">+</div>
                                                    <div class="col">{{ $piso['piso']->name }}</div>
                                                    <div class="col">
                                                        <button onclick="mostrarFormEditar('pisos', $piso['piso']->id)" type="button" class="btn btn-primary botones-redondos" data-bs-toggle="modal" data-bs-target="#Modal">
                                                            Editar
                                                        </button>
                                                        <button onclick="mostrarFormAlta('oficinas')" type="button" class="btn btn-primary botones-redondos" data-bs-toggle="modal" data-bs-target="#Modal">
                                                            Agregar Oficina
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="collapse" id="piso{{ $piso['piso']->piso }}">
                                                    <div class="">
                                                        @foreach ($piso['ubi'] as $ubi)
                                                            <div class="row">
                                                                <div class="col-1"></div>
                                                                <div class="col">{{ $ubi['ubi']->nom }}</div>
                                                                <div class="col">
                                                                    <button onclick="mostrarFormEditar('oficinas', $piso['piso']->id)" type="button" class="btn btn-primary botones-redondos" data-bs-toggle="modal" data-bs-target="#Modal">
                                                                        Editar
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel">Ubicaciones</h5>
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
<script src="{{asset('js/ubicaciones/altaComplejoEdificioScripts.js')}}"></script>
@endpush
