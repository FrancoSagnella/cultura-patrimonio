<form action="/tipos-bien" method="post" enctype="multipart/form-data" id="formAlta">
    @csrf
    {{-- Nombre Ingreso input --}}
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 mt-3">
                <label for="cod_presup">Código presupuestario</label>
                <input class="form-control" type="text" name="cod_presup" id="cod_presup">
            </div>
            <div class="col-md-8 offset-md-2 mt-3">
                <label for="tipo_bien">Tipo bien</label>
                <input class="form-control" type="text" name="tipo_bien" id="tipo_bien">
            </div>
            <div class="col-md-8 offset-md-2 mt-3">
                <label for="nom">Nombre</label>
                <input class="form-control" type="text" name="nom" id="nom">
            </div>
            <div class="col-md-8 offset-md-2 mt-3">
                <label for="descripcion">Descripción</label>
                <input class="form-control" type="text" name="descripcion" id="descripcion">
            </div>
            <div class="col-md-8 offset-md-2 mt-3">
                <label for="amortizacion">Amortizacion</label>
                <input class="form-control" type="text" name="amortizacion" id="amortizacion">
            </div>
            <div class="col-md-8 offset-md-2 mt-3">
                <label for="alicuota">Alicuota</label>
                <input class="form-control" type="text" name="alicuota" id="alicuota">
            </div>
        </div>
        {{-- Nombre Ingreso input --}}
        <div class="row mt-4">
            <div class="col-6 text-end">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
            <div class="col-6">
                <button type="button" class="btn btn-primary" onclick="enviarFormAlta('tipos-bien')">Guardar</button>
            </div>
        </div>
    </div>
</form>
