
<div class="container">
    {{-- Complejo input --}}
    <div class="row">
        <div class="col-2 mt-3">
            Complejo/Edificio
        </div>
        <div class="col-8 mt-3">
            <select class="form-control" name="complejo" id="complejo" onchange="loadUfFromSelectedComplejo('complejo', 'uf')">
                <option value="" selected>Seleccione</option>
                @foreach ($complejos as $complejo)
                    <option value="{{$complejo->id}}-{{$complejo->chk_uf}}">{{$complejo->nom}}</option>
                @endforeach
            </select>
        </div>
    </div>
    {{-- Complejo input --}}

    {{-- Input que indica si el complejo seleccionado es edificio o no --}}
    <input type="hidden" id="esEdificio" value="0">

    {{-- Unidad Funcional input --}}
    <div class="" id="seccionUFS">

    </div>
    {{-- <div class="row">
        <div class="col-2 mt-3">
            Unidad Funcional
        </div>
        <div class="col-8 mt-3">
            <select class="form-control" name="uf" id="uf">
                <option value="" selected>Seleccione</option>
            </select>
        </div>
    </div> --}}
    {{-- Unidad Funcional input --}}

    {{-- Nombre piso input --}}
    <div class="row">
        <div class="col-2 mt-3">
            Nombre
        </div>
        <div class="col-8 mt-3">
            <input class="form-control" type="text" name="nombre" id="nombre">
        </div>
    </div>
    {{-- Nombre piso input --}}
</div>
