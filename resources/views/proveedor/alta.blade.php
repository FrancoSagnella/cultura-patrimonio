<script>
    var token="<?php echo csrf_token() ?>";
    var url= "{{ url('/') }}"; 
</script>

<form action="/proveedores" method="post" enctype="multipart/form-data" id="formAlta">
    @csrf
    {{-- Nombre Ingreso input --}}
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1 mt-3">
                <label for="nom">Nombre</label>
                <input class="form-control" type="text" name="nom" id="nom">
            </div>
            <div class="col-md-10 offset-md-1 mt-3">
                <label for="ape">Apellido</label>
                <input class="form-control" type="text" name="ape" id="ape">
            </div>
            {{-- <div class="col-md-8 offset-md-2 mt-3">
                <label for="descripcion_proveedor">Descripcion del proveedor</label>
                <input class="form-control" type="text" name="descripcion_proveedor" id="descripcion_proveedor">
            </div> --}}
                    {{-- Provincia Input --}}
            <div class="col-md-10 offset-md-1 mt-3">
                <label for="provincia_id">Provincia</label>
                <select class="form-control" name="provincia_id" id="provincia_id" onchange="getLocalidades(token)">
                    <option value="" selected>Seleccione una Provincia</option>
                    @foreach ($provincias as $provincia)
                        <option value="{{$provincia->id}}">{{$provincia->descr}}</option>
                    @endforeach
                </select>
            </div>
            {{-- Localidad input --}}
            <div class="col-md-10 offset-md-1 mt-3">
                <label for="localidad">Localidad</label>
                <select class="form-control" name="localidad" id="localidad" class="form-control">
                </select>
            </div>
            <div class="col-md-10 offset-md-1 mt-3">
                <label for="calle">Calle</label>
                <input class="form-control" type="text" name="calle" id="calle">
            </div>
            <div class="col-md-10 offset-md-1 row mt-3">
                <div class="col-sm-4">                
                    <label for="nro">Altura</label>
                    <input class="form-control" type="text" name="nro" id="nro">
                </div>
                <div class="col-sm-4">                
                    <label for="piso">Piso</label>
                    <input class="form-control" type="text" name="piso" id="piso">
                </div>
                <div class="col-sm-4">                
                    <label for="depto">Departamento</label>
                    <input class="form-control" type="text" name="depto" id="depto">
                </div>
            </div> 
            <div class="col-md-10 offset-md-1 row mt-3">
                <div class="col-sm-6">                
                    <label for="cp">Código Postal</label>
                    <input class="form-control" type="text" name="cp" id="cp">
                </div>
                <div class="col-sm-6">                
                    <label for="tel">Teléfono</label>
                    <input class="form-control" type="text" name="tel" id="tel">
                    <input class="form-control" type="hidden" name="del" id="del" value="0">

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