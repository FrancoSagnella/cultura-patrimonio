<form action="/tipos-remito/{{ $remito->id }}" method="put" enctype="multipart/form-data" id="formEditar">
    @csrf
    {{-- Nombre Ingreso input --}}
    <div class="container">
        <div class="row">
            <div class="col-4 mt-3">
                Ingreso
            </div>
            <div class="col-8 mt-3">
                <input class="form-control" type="text" name="tipo_remito" id="tipo_remito" value="{{ $remito->tipo_remito }}">
            </div>
        </div>
        {{-- Nombre Ingreso input --}}

        <div class="row mt-4">
            <div class="col-6 text-end">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
            <div class="col-6">
                <button type="button" class="btn btn-primary" onclick="enviarFormEditar('tipos-remito', {{ $remito->id }})">Guardar</button>
            </div>
        </div>
    </div>
</form>
