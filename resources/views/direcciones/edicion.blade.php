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
            if(msg.data[i].localidad != {{ $direccion->localidad }})
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
$("#user-destino-cp").val("");

</script>

<form action="/" method="put" enctype="multipart/form-data" id="formEditar">
    @csrf
    <div class="container">

        {{-- Provincia Input --}}
        <div class="row">
            <div class="col-2 mt-3">
                Provincia
            </div>
            <div class="col-8 mt-3">
                <select class="form-control" name="provincia_id" id="provincia_id" onchange="getLocalidades(token)">
                    <option value="" selected>Seleccione una Provincia</option>
                    @foreach ($provincias as $provincia)
                        <option value="{{$provincia->id}}"
                        @if($direccion->provincia_id == $provincia->id)
                            selected="selected"
                        @endif
                        >{{$provincia->descr}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        {{-- Provincia Input --}}

        {{-- Localidad input --}}
        <div class="row">
            <div class="col-2 mt-3">
                Localidad
            </div>
            <div class="col-8 mt-3">
                <select class="form-control" name="localidad" id="localidad" class="form-control">

                </select>
                {{-- <input class="form-control" type="text" name="loc" id="loc"> --}}
            </div>
        </div>
        {{-- Localidad input --}}

        {{-- calle input --}}
        <div class="row">
            <div class="col-2 mt-3">
                Calle
            </div>
            <div class="col-8 mt-3">
                <input class="form-control" type="text" name="calle" id="calle" value="{{ $direccion->calle }}">
            </div>
        </div>
        {{-- calle input --}}

        {{-- numero input --}}
        <div class="row">
            <div class="col-2 mt-3">
                Numero
            </div>
            <div class="col-8 mt-3">
                <input class="form-control" type="text" name="nro" id="nro" value="{{ $direccion->nro }}">
            </div>
        </div>
        {{-- numero input --}}

        {{-- cp input --}}
        <div class="row">
            <div class="col-2 mt-3">
                Codigo Postal
            </div>
            <div class="col-8 mt-3">
                <input class="form-control" type="text" name="cp" id="cp" value="{{ $direccion->cp }}">
            </div>
        </div>
        {{-- cp input --}}

        {{-- telefono input --}}
        <div class="row">
            <div class="col-2 mt-3">
                Telefono
            </div>
            <div class="col-8 mt-3">
                <input class="form-control" type="text" name="tel" id="tel" value="{{ $direccion->tel }}">
            </div>
        </div>
        {{-- telefono input --}}

        <div class="row mt-4">
            <div class="col-6 text-end">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
            <div class="col-6">
                <button type="button" class="btn btn-primary" onclick="enviarFormEditar('direcciones', {{ $direccion->id }})">Guardar</button>
            </div>
        </div>
    </div>
</form>
