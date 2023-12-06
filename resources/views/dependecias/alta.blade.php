<form action="/" method="post" enctype="multipart/form-data" id="formAlta">
    @csrf
    <div class="container">

        {{-- Tipo ubicacion Input --}}
        <div class="row">
            <div class="col-2 mt-1">
                Seleccione Dependencia Principal
            </div>
            <div class="col-8">
                <select class="form-control" name="dep_id_p" id="dep_id_p" onchange="onSelectPadre()">
                    <option value="" selected>Seleccione</option>
                    @foreach ($dependencia_padre as $item)
                        <option value="{{$item->id}}">{{$item->nom}}</option>
                    @endforeach
                </select>
            </div>
            {{-- Seccion con el form nuevo segun tipo de ubicacion que se elija --}}
            <div  class="col-8" id="content">
    
            </div>
        </div>

        <input type="hidden" id="dependencia-final-seleccionada" name="dependencia-final-seleccionada" value="{{ old('dependencia-final-seleccionada') ?? 'sinSeleccion' }}">
        {{-- Tipo ubicacion Input --}}
</form>