<form action="/proveedores" method="post" enctype="multipart/form-data" id="formAlta">
    @csrf
    {{-- Nombre Ingreso input --}}
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 mt-3">
                <label for="nombre_proveedor">Nombre Proveedor</label>
                <input class="form-control" type="text" name="nombre_proveedor" id="nombre_proveedor">
            </div>
            <div class="col-md-8 offset-md-2 mt-3">
                <label for="descripcion_proveedor">Descripcion del proveedor</label>
                <input class="form-control" type="text" name="descripcion_proveedor" id="descripcion_proveedor">
            </div>
            <div class="col-md-8 offset-md-2 mt-3">
                <label for="calle">Calle</label>
                <input class="form-control" type="text" name="calle" id="calle">
            </div>
            <div class="col-md-8 offset-md-2 row mt-3">
                <div class="col-sm-4">                
                    <label for="numero">Altura</label>
                    <input class="form-control" type="text" name="numero" id="numero">
                </div>
                <div class="col-sm-4">                
                    <label for="piso">Piso</label>
                    <input class="form-control" type="text" name="piso" id="piso">
                </div>
                <div class="col-sm-4">                
                    <label for="departamento">Departamento</label>
                    <input class="form-control" type="text" name="departamento" id="departamento">
                </div>
            </div> 
            <div class="col-md-8 offset-md-2 mt-3">
                <label for="localidad">Localidad</label>
                <input class="form-control" type="text" name="localidad" id="localidad">
            </div>
            <div class="col-md-8 offset-md-2 mt-3">
                <label for="provincia_id">Provincia</label>
                <select class="form-select" name="provincia_id" id="provincia_id">
                    @foreach($provincias as $provincia)
                        <option value="{{ $provincia->id }}">{{ $provincia->nombre_provincia }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-8 offset-md-2 row mt-3">
                <div class="col-sm-6">                
                    <label for="codigo_postal">Codigo Postal</label>
                    <input class="form-control" type="text" name="codigo_postal" id="codigo_postal">
                </div>
                <div class="col-sm-6">                
                    <label for="telefono">Telefono</label>
                    <input class="form-control" type="text" name="telefono" id="telefono">
                    <input class="form-control" type="hidden" name="sf_guard_user_id" id="sf_guard_user_id">

                </div>
            </div> 
        </div>
        {{-- Nombre Ingreso input --}}

        <div class="row mt-4">
            <div class="col-6 text-end">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
            <div class="col-6">
                <button type="button" class="btn btn-primary" onclick="enviarFormAlta('proveedores')">Guardar</button>
            </div>
        </div>
    </div>
</form>