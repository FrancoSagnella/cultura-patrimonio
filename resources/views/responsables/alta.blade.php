<form action="/responsables" method="post" enctype="multipart/form-data" id="formAlta">
    @csrf
    {{-- Nombre Ingreso input --}}
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 row align-items-baseline mt-3">
                <div class="col-sm-6">
                    <label for="nombre">Nombre</label>
                    <input class="form-control" type="text" name="nombre" id="nombre">
                </div>
                <div class="col-sm-6">
                    <label for="apellido">Apellido</label>
                    <input class="form-control" type="text" name="apellido" id="apellido">
                </div>
            </div>
            <div class="col-md-8 offset-md-2 row align-items-baseline mt-3">
                <div class="col-sm-4">                
                    <label for="dni">DNI</label>
                    <input class="form-control" type="text" name="dni" id="dni">
                </div>
                <div class="col-sm-8">
                    <label for="mail">Email</label>
                    <input class="form-control" type="text" name="mail" id="mail">
                </div>
            </div>
            <div class="col-md-8 offset-md-2 row align-items-baseline mt-3">
                <div class="col-sm-6">
                    <label for="tipo_responsable_id">Tipo Responsable</label>
                    <select class="form-select" name="tipo_responsable_id" id="tipo_responsable_id">
                        @foreach($tiposResponsable as $tipoResponsable)
                            <option value="{{ $tipoResponsable->id }}">{{ $tipoResponsable->tipo_responsable }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-6">
                    <label for="tipo_asignacion_id">Tipo Asignación</label>
                    <select class="form-select" name="tipo_asignacion_id" id="tipo_asignacion_id">
                        @foreach($tiposAsignacion as $tipoAsignacion)
                            <option value="{{ $tipoAsignacion->id }}">{{ $tipoAsignacion->tipo_asignacion }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-8 offset-md-2 row align-items-baseline mt-3">
                <div class="col-sm-6">                
                    <label for="nro_asignacion">Número Asignación</label>
                    <input class="form-control" type="text" name="nro_asignacion" id="nro_asignacion">
                </div>
                <div class="col-sm-6">                
                    <label for="anio_asignacion">Año Asiganción</label>
                    <input class="form-control" type="text" name="anio_asignacion" id="anio_asignacion">
                    <input class="form-control" type="hidden" value="0" name="sf_guard_user_id" id="sf_guard_user_id">
                    <input class="form-control" type="hidden" value="1" name="dependencia_id" id="dependencia_id">
                </div>
            </div> 
            <div class="col-md-8 offset-md-2 row align-items-baseline mt-3">           
                <label for="descripcion">Descripción</label>
                <div>
                    <textarea class="form-control" type="text" name="descripcion" id="descripcion"></textarea>
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