<form action="/tipos-baja" method="post" enctype="multipart/form-data" id="formAlta">
    @csrf
    {{-- Nombre Ingreso input --}}
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 mt-3">
                <label for="tipo_baja">Tipo Baja</label>
                <input class="form-control" type="text" name="tipo_baja" id="tipo_baja">
            </div>
        </div>
        {{-- Nombre Ingreso input --}}
        <div class="row mt-4">
            <div class="col-6 text-end">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
            <div class="col-6">
                <button type="button" class="btn btn-primary" onclick="enviarFormAlta('tipos-baja')">Guardar</button>
            </div>
        </div>
    </div>
</form>