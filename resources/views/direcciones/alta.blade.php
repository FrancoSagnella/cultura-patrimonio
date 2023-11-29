<form action="/" method="post" enctype="multipart/form-data" id="formAlta">
    @csrf
    <div class="container">

        {{-- Provincia Input --}}
        <div class="row">
            <div class="col-2 mt-3">
                Provincia
            </div>
            <div class="col-8 mt-3">
                <select class="form-control" name="prov_id" id="prov_id">
                    <option value="" selected>Seleccione una Provincia</option>
                    @foreach ($provincias as $provincia)
                        <option value="{{$provincia->id}}">{{$provincia->nombre_provincia}}</option>
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
                <input class="form-control" type="text" name="loc" id="loc">
            </div>
        </div>
        {{-- Localidad input --}}

        {{-- calle input --}}
        <div class="row">
            <div class="col-2 mt-3">
                Calle
            </div>
            <div class="col-8 mt-3">
                <input class="form-control" type="text" name="calle" id="calle">
            </div>
        </div>
        {{-- calle input --}}

        {{-- numero input --}}
        <div class="row">
            <div class="col-2 mt-3">
                Numero
            </div>
            <div class="col-8 mt-3">
                <input class="form-control" type="text" name="nro" id="nro">
            </div>
        </div>
        {{-- numero input --}}

        {{-- cp input --}}
        <div class="row">
            <div class="col-2 mt-3">
                Codigo Postal
            </div>
            <div class="col-8 mt-3">
                <input class="form-control" type="text" name="cp" id="cp">
            </div>
        </div>
        {{-- cp input --}}

        {{-- telefono input --}}
        <div class="row">
            <div class="col-2 mt-3">
                Telefono
            </div>
            <div class="col-8 mt-3">
                <input class="form-control" type="text" name="tel" id="tel">
            </div>
        </div>
        {{-- telefono input --}}

        @if($fromAltaDirecciones)
            <div class="row mt-4">
                <div class="col-6 text-end">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
                <div class="col-6">
                    <button type="button" class="btn btn-primary" onclick="enviarFormAlta('direcciones')">Guardar</button>
                </div>
            </div>
        @endif
    </div>
</form>
