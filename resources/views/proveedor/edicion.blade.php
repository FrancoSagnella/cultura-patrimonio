<script>
    var token="<?php echo csrf_token() ?>";
    var url= "{{ url('/') }}"; 
        
$("#localidad").html('<option value="" id="optionlocdefault" selected="selected">Cargando...</option>');
jQuery.ajax({
    type: "get",
    url: url+'/getLocalidades/'+$("#provincia_id").val(),
    data:'_token = ' + token,
    success: function( msg ) {
        for(var i = 0; i< msg.data.length; i++ ){
            if(msg.data[i].localidad != {{ $proveedor->localidad }})
            {
                $("#localidad").append('<option selected="selected" value="'+msg.data[i].localidad+'"'+'>'+msg.data[i].descr+'</option>');
            }
            else
            {
                $("#localidad").append("<option value= "+msg.data[i].localidad+">"+msg.data[i].descr+"</option>");
            }
        }
        $("#optionlocdefault").html("Seleccionar...");
    }
});
</script>

<form action="/" method="put" enctype="multipart/form-data" id="formEditar">
    @csrf
    {{-- Nombre Ingreso input --}}
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1 mt-3">
                <label for="nom">Nombre</label>
                <input class="form-control" type="text" name="nom" id="nom" value="{{$proveedor->nom}}">
            </div>
            <div class="col-md-10 offset-md-1 mt-3">
                <label for="ape">Apellido</label>
                <input class="form-control" type="text" name="ape" id="ape" value="{{$proveedor->ape}}">
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
                        <option value="{{$provincia->id}}"
                        @if($proveedor->provincia_id == $provincia->id)
                            selected="selected"
                        @endif
                        >{{$provincia->descr}}
                        </option>
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
                <input class="form-control" type="text" name="calle" id="calle" value="{{$proveedor->calle}}">
            </div>
            <div class="col-md-10 offset-md-1 row mt-3">
                <div class="col-sm-4">                
                    <label for="nro">Altura</label>
                    <input class="form-control" type="text" name="nro" id="nro" value="{{$proveedor->nro}}">
                </div>
                <div class="col-sm-4">                
                    <label for="piso">Piso</label>
                    <input class="form-control" type="text" name="piso" id="piso" value="{{$proveedor->piso}}">
                </div>
                <div class="col-sm-4">                
                    <label for="depto">Departamento</label>
                    <input class="form-control" type="text" name="depto" id="depto" value="{{$proveedor->depto}}">
                </div>
            </div> 
            <div class="col-md-10 offset-md-1 row mt-3">
                <div class="col-sm-6">                
                    <label for="cp">Código Postal</label>
                    <input class="form-control" type="text" name="cp" id="cp" value="{{$proveedor->cp}}">
                </div>
                <div class="col-sm-6">                
                    <label for="tel">Teléfono</label>
                    <input class="form-control" type="text" name="tel" id="tel" value="{{$proveedor->tel}}">
                    <input class="form-control" type="hidden" name="del" id="del" value="{{$proveedor->del}}">

                </div>
            </div> 
        </div>
        {{-- Nombre Ingreso input --}}

        <div class="row mt-4">
            <div class="col-6 text-end">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
            <div class="col-6">
                <button type="button" class="btn btn-primary" onclick="enviarFormEditar('proveedores', {{ $proveedor->id }})">Guardar</button>
            </div>
        </div>
    </div>
</form>