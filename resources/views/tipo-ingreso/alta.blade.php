<form action="/tipos-ingreso" method="post" enctype="multipart/form-data" id="formAlta">
    @csrf
    {{-- Nombre Ingreso input --}}
    <div class="container">
        <div class="row">
            <div class="col-2 mt-3">
                Ingreso
            </div>
            <div class="col-8 mt-3">
                <input class="form-control" type="text" name="ingreso" id="ingreso">
            </div>
        </div>
        {{-- Nombre Ingreso input --}}

        <div class="row mt-4">
            <div class="col-6 text-end">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
            <div class="col-6">
                <button type="button" class="btn btn-primary" onclick="enviarFormAlta('tipos-ingreso')">Guardar</button>
            </div>
        </div>
    </div>
</form>
