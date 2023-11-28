<form action="/tipos-estado" method="post" enctype="multipart/form-data" id="formAlta">
    @csrf
    {{-- Nombre Ingreso input --}}
    <div class="container">
        <div class="row">
            <div class="col-4 mt-3">
                Estado
            </div>
            <div class="col-8 mt-3">
                <input class="form-control" type="text" name="universo" id="universo">
            </div>
        </div>
        {{-- Nombre Ingreso input --}}

        <input type="hidden" id="habilitado" name="habilitado" value="1">

        <div class="row mt-4">
            <div class="col-6 text-end">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
            <div class="col-6">
                <button type="button" class="btn btn-primary" onclick="enviarFormAlta('tipos-estado')">Guardar</button>
            </div>
        </div>
    </div>
</form>
