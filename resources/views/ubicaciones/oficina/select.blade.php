<div class="row">
    <div class="col-2 mt-3">
        Oficina
    </div>
    <div class="col-8 mt-3">
        <select class="form-control" name="uf" id="uf">
            <option value="" selected>Seleccione</option>
            @foreach ($oficinas as $oficina)
                <option value="{{$oficina->ubi}}">{{$oficinas->nom}}</option>
            @endforeach
        </select>
    </div>
</div>
