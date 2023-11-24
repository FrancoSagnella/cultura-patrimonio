<form action="/tipos-responsable" method="post" enctype="multipart/form-data" id="formAlta">
    @csrf
    {{-- Nombre Ingreso input --}}
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 mt-3">
                <label for="tipo_responsable">Tipo Responsable</label>
                <input class="form-control" type="text" name="tipo_responsable" id="tipo_responsable">
            </div>
            <div class="col-md-8 offset-md-2 mt-3">
                <label for="descripcion">Descripción</label>
                <input class="form-control" type="text" name="descripcion" id="descripcion">
            </div>
        </div>
        {{-- Nombre Ingreso input --}}
        <div class="row mt-4">
            <div class="col-6 text-end">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
            <div class="col-6">
                <button type="button" class="btn btn-primary" onclick="enviarFormAlta('tipos-responsable')">Guardar</button>
            </div>
        </div>
    </div>
</form>