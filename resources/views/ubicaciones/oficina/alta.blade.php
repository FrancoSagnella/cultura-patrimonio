
<div class="container">

    {{-- Complejo/Edificio --}}
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

    {{-- Input que indica si el complejo seleccionado es edificio o no --}}
    <input type="hidden" id="esEdificio" value="0">

    {{-- Unidad Funcional input --}}
    <div class="" id="seccionUFS">

    </div>

    {{-- Pisos input --}}
    <div class="" id="seccionPisos">

    </div>

    {{-- Nombre complejo / edificio input --}}
    <div class="row">
        <div class="col-2 mt-3">
            Nombre
        </div>
        <div class="col-8 mt-3">
            <input class="form-control" type="text" name="nombre" id="nombre">
        </div>
    </div>
    {{-- Nombre complejo / edificio input --}}

    {{-- Dependencia input --}}
    <div class="row">
        <div class="col-2 mt-3">
            Dependiente de
        </div>
        <div class="col-8 mt-3">
            <select class="form-control" name="dependencia" id="dependencia" onchange="mostrarResponsable()">
                <option value="" selected>Seleccione</option>
                <option value="1">Ministerio de cultura de la nacion</option>
            </select>
        </div>
    </div>
    {{-- Dependencia input --}}

    {{-- Asignado a input (se tendria que cargar a partir de lo seleccionado arriba, parecido a como cargo los UF y pisos) --}}
    <div class="row">
        <div class="col-2 mt-3">
            Asignado a
        </div>
        <div class="col-8 mt-3">
            <select class="form-control" name="asignadoa" id="asignadoa">
                <option value="" selected>Seleccione</option>
                <option value="1">Ministerio de cultura de la nacion</option>
            </select>
        </div>
    </div>
    {{-- Asignado a input --}}

    {{-- Seccion para mostrar al responsable HAY QUE HACERLA DINAMICA (parecido a como cargo los pisos y ufs)--}}
    <div class="row mt-5 border-top" id="seccionResponsable" style="display: none">
        <div class="col">

            <div class="row">
                <div class="col-2 mt-3">
                    Tipo Responsable
                </div>
                <div class="col-8 mt-3">
                    <input disabled class="form-control" type="text" name="tipoResponsable" id="tipoResponsable" value="Ministro">
                </div>
            </div>

            <div class="row">
                <div class="col-2 mt-3">
                    Nombre
                </div>
                <div class="col-8 mt-3">
                    <input disabled class="form-control" type="text" name="nombreResponsable" id="nombreResponsable" value="Juancito">
                </div>
            </div>

            <div class="row">
                <div class="col-2 mt-3">
                    Apellido
                </div>
                <div class="col-8 mt-3">
                    <input disabled class="form-control" type="text" name="apellidoResponsable" id="apellidoResponsable" value="Juancito">
                </div>
            </div>

            <div class="row">
                <div class="col-2 mt-3">
                    DNI
                </div>
                <div class="col-8 mt-3">
                    <input disabled class="form-control" type="text" name="dniResponsable" id="dniResponsable" value="11222333">
                </div>
            </div>

            <div class="row">
                <div class="col-2 mt-3">
                    Mail
                </div>
                <div class="col-8 mt-3">
                    <input disabled class="form-control" type="text" name="mailResponsable" id="mailResponsable" value="Juancito@gmail.com">
                </div>
            </div>

            <div class="row">
                <div class="col-2 mt-3">
                    Tipo de Asignacion
                </div>
                <div class="col-8 mt-3">
                    <select disabled class="form-control" name="provincia" id="provincia">
                        <option value="" selected>Tipo de asignacion</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-2 mt-3">
                    Numero de Asignacion
                </div>
                <div class="col-8 mt-3">
                    <input disabled class="form-control" type="text" name="nroAsignacionReposnsable" id="nroAsignacionReposnsable" value="2">
                </div>
            </div>

            <div class="row">
                <div class="col-2 mt-3">
                    Año de Asignacion
                </div>
                <div class="col-8 mt-3">
                    <input disabled class="form-control" type="text" name="anioAsignacionReposnsable" id="anioAsignacionReposnsable" value="2020">
                </div>
            </div>
        </div>
    </div>
    {{-- Termina seccion para mostrar al responsable --}}


</div>
