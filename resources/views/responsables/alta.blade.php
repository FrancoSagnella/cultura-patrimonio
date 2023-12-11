<form action="/responsables" method="post" enctype="multipart/form-data" id="formAlta">
    @csrf
    {{-- Nombre Ingreso input --}}
    <div class="container">
        <div class="row">
            <div class="row align-items-baseline mt-3">
                <div class="col-sm-6">
                    <label for="nombre">Nombre</label>
                    <input class="form-control" type="text" name="nom" id="nom">
                </div>
                <div class="col-sm-6">
                    <label for="apellido">Apellido</label>
                    <input class="form-control" type="text" name="ape" id="ape">
                </div>
            </div>
            <div class="row align-items-baseline mt-3">
                <div class="col-sm-6">                
                    <label for="dni">DNI</label>
                    <input class="form-control" type="text" name="dni" id="dni">
                </div>
                <div class="col-sm-6">
                    <label for="tel">Teléfono</label>
                    <input class="form-control" type="text" name="tel" id="tel">
                </div>
            </div>
            <div class="row align-items-baseline mt-3">
                <div class="col-sm-12">                
                    <label for="mail">Email</label>
                    <input class="form-control" type="text" name="mail" id="mail">
                </div>
            </div>
            <div class="row align-items-baseline mt-3">
                <div class="col-sm-6">
                    <label for="tipo_res_id">Tipo Responsable</label>
                    <select class="form-select" name="tipo_res_id" id="tipo_res_id">
                            <option value="0">Seleccione</option>
                        @foreach($tiposResponsable as $tipoResponsable)
                            <option value="{{ $tipoResponsable->id }}">{{ $tipoResponsable->descr }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-6">
                    <label for="tipo_asi_id">Tipo Asignación</label>
                    <select class="form-select" name="tipo_asi_id" id="tipo_asi_id">
                        <option value="0">Seleccione</option>
                        @foreach($tiposAsignacion as $tipoAsignacion)
                            <option value="{{ $tipoAsignacion->id }}">{{ $tipoAsignacion->descr }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row align-items-baseline mt-3">
                <div class="col-sm-6">                
                    <label for="nro_asig">Número Asignación</label>
                    <input class="form-control" type="text" name="nro_asig" id="nro_asig">
                </div>
                <div class="col-sm-6">                
                    <label for="anio_asig">Año Asiganción</label>
                    <input class="form-control" type="text" name="anio_asig" id="anio_asig">
                    {{-- <input class="form-control" type="hidden" value="0" name="sf_guard_user_id" id="sf_guard_user_id"> --}}
                    <input class="form-control" type="hidden" value="0" name="del" id="del">
                </div>
            </div> 
            <div class="row align-items-baseline mt-3">           
                <label for="text">Descripción</label>
                <div>
                    <textarea class="form-control" type="text" name="text" id="text"></textarea>
                </div>
            </div>
        </div>
        {{-- Nombre Ingreso input --}}

        <div class="row mt-4">
            <div class="col-6 text-end">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
            <div class="col-6">
                <button type="button" class="btn btn-primary" onclick="enviarFormAlta('responsables')">Guardar</button>
            </div>
        </div>
    </div>
</form>