<form action="/tipos-estado/{{ $tipoEstado->id }}" method="put" enctype="multipart/form-data" id="formEditar">
    @csrf
    {{-- Nombre Ingreso input --}}
    <div class="container">
        <div class="row">
            <div class="col-4 mt-3">
                Estado
            </div>
            <div class="col-8 mt-3">
                <input class="form-control" type="text" name="universo" id="universo" value="{{ $tipoEstado->universo }}">
            </div>
        </div>
        {{-- Nombre Ingreso input --}}

        <div class="row mt-4">
            <div class="col-6 text-end">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
            <div class="col-6">
                <button type="button" class="btn btn-primary" onclick="enviarFormEditar('tipos-estado', {{ $tipoEstado->id }})">Guardar</button>
            </div>
        </div>
    </div>
</form>
