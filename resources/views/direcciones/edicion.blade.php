<form action="/" method="put" enctype="multipart/form-data" id="formEditar">
    @csrf
    <div class="container">

        {{-- Provincia Input --}}
        <div class="row">
            <div class="col-2 mt-3">
                Provincia
            </div>
            <div class="col-8 mt-3">
                <select class="form-control" name="prov_id" id="prov_id">
                    @foreach ($provincias as $provincia)
                        <option
                        @if($direccion->prov_id === $provincia->id)
                            selected
                        @endif
                        value="{{$provincia->id}}">{{$provincia->nombre_provincia}}</option>
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
                <input class="form-control" type="text" name="loc" id="loc" value="{{ $direccion->loc }}">
            </div>
        </div>
        {{-- Localidad input --}}

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
