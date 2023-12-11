<form action="/tipos-remito" method="post" enctype="multipart/form-data" id="formAlta">
    @csrf
    {{-- Nombre Ingreso input --}}
    <div class="container">
        <div class="row">
            <div class="col-md-4 mt-3">
                Remito
            </div>
            <div class="col-md-8 mt-3">
                <input class="form-control" type="text" name="descr" id="descr">
            </div>
            <div class="col-md-4 mt-3">
                Descripción
            </div>
            <div class="col-md-8 mt-3">
                {{-- <input class="form-control" type="text" name="descripcion"> --}}
                <textarea name="text"  class="form-control" cols="30" rows="10"></textarea>
            </div>
        </div>
        {{-- Nombre Ingreso input --}}

        <input type="hidden" id="habilitado" name="habilitado" value="1">

        <div class="row mt-4">
            <div class="col-6 text-end">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
            <div class="col-6">
                <button type="button" class="btn btn-primary" onclick="enviarFormAlta('tipos-remito')">Guardar</button>
            </div>
        </div>
    </div>
</form>
