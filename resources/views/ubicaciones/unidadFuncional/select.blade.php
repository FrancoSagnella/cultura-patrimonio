<div class="row">
    <div class="col-2 mt-3">
        Unidad Funcional
    </div>
    <div class="col-8 mt-3">
        <select class="form-control" name="uf" id="uf" onchange="loadPisoFromUF('uf', 'seccionPisos')">
            <option value="" selected>Seleccione</option>
            @foreach ($ufs as $uf)
                <option value="{{$uf->id}}">{{$uf->nom}}</option>
            @endforeach
        </select>
    </div>
</div>
