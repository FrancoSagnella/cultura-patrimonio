<div class="row">
    <div class="col-2 mt-3">
        Piso
    </div>
    <div class="col-8 mt-3">
        <select class="form-control" name="piso" id="piso" onchange="loadOficinaFromPiso('piso', 'seccionOficinas')">
            <option value="" selected>Seleccione</option>
            @foreach ($pisos as $piso)
                <option value="{{$piso->piso}}">{{$piso->name}}</option>
            @endforeach
        </select>
    </div>
</div>
