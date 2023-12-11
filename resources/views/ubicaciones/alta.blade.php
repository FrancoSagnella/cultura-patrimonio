<form action="/" method="post" enctype="multipart/form-data" id="formAlta">
    @csrf
    <div class="container">

        {{-- Tipo ubicacion Input --}}
        <div class="row">
            <div class="col-2 mt-1">
                Tipo de ubicación
            </div>
            <div class="col-8">
                <select class="form-control" name="tipoUbicacion" id="tipoUbicacion" onchange="onSelectTipoUbicacion()">
                    <option value="" selected>Seleccione</option>
                    <option value="complejos">Complejo</option>
                    <option value="edificios">Edificio</option>
                    <option value="unidades-funcionales">Unidad Funcional</option>
                    <option value="pisos">Piso</option>
                    <option value="oficinas">Oficina</option>

                </select>
            </div>
        </div>
        {{-- Tipo ubicacion Input --}}

        {{-- Seccion con el form nuevo segun tipo de ubicacion que se elija --}}
        <div id="content">

        </div>
</form>
