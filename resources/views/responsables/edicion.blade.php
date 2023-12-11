<form action="/responsables/{{$responsable->id}}" method="put" enctype="multipart/form-data" id="formEditar">
    @csrf
    {{-- Nombre Ingreso input --}}
    <div class="container">
        <div class="row">
            <div class="row align-items-baseline mt-3">
                <div class="col-sm-6">
                    <label for="nombre">Nombre</label>
                    <input class="form-control" type="text" name="nom" id="nom" value="{{$responsable->nom}}">
                </div>
                <div class="col-sm-6">
                    <label for="apellido">Apellido</label>
                    <input class="form-control" type="text" name="ape" id="ape" value="{{$responsable->ape}}">
                </div>
            </div>
            <div class="row align-items-baseline mt-3">
                <div class="col-sm-6">                
                    <label for="dni">DNI</label>
                    <input class="form-control" type="text" name="dni" id="dni" value="{{$responsable->dni}}">
                </div>
                <div class="col-sm-6">
                    <label for="tel">Teléfono</label>
                    <input class="form-control" type="text" name="tel" id="tel" value="{{$responsable->tel}}">
                </div>
            </div>
            <div class="row align-items-baseline mt-3">
                <div class="col-sm-12">                
                    <label for="mail">Email</label>
                    <input class="form-control" type="text" name="mail" id="mail" value="{{$responsable->mail}}">
                </div>
            </div>
            <div class="row align-items-baseline mt-3">
                <div class="col-sm-6">
                    <label for="tipo_res_id">Tipo Responsable</label>
                    <select class="form-select" name="tipo_res_id" id="tipo_res_id">
                        @foreach($tiposResponsable as $tipoResponsable)
                            <option value="{{ $tipoResponsable->id }}">{{ $tipoResponsable->descr }}
                            @if( $tipoResponsable->id ==  $responsable->tipo_res_id)
                                selected
                            @endif
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-6">
                    <label for="tipo_asi_id">Tipo Asignación</label>
                    <select class="form-select" name="tipo_asi_id" id="tipo_asi_id">
                        @foreach($tiposAsignacion as $tipoAsignacion)
                            <option value="{{ $tipoAsignacion->id }}">{{ $tipoAsignacion->descr }}
                            @if( $tipoAsignacion->id ==  $responsable->tipo_asi_id)
                                selected
                            @endif
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row align-items-baseline mt-3">
                <div class="col-sm-6">                
                    <label for="nro_asig">Número Asignación</label>
                    <input class="form-control" type="text" name="nro_asig" id="nro_asig" value="{{$responsable->nro_asig}}">
                </div>
                <div class="col-sm-6">                
                    <label for="anio_asig">Año Asiganción</label>
                    <input class="form-control" type="text" name="anio_asig" id="anio_asig" value="{{$responsable->anio_asig}}">
                    {{-- <input class="form-control" type="hidden" value="0" name="sf_guard_user_id" id="sf_guard_user_id"> --}}
                    <input class="form-control" type="hidden" value="0" name="del" id="del" value="{{$responsable->del}}">
                </div>
            </div> 
            <div class="row align-items-baseline mt-3">           
                <label for="text">Descripción</label>
                <div>
                    <textarea class="form-control" type="text" name="text" id="text">{{$responsable->text}}</textarea>
                </div>
            </div>
        </div>
        {{-- Nombre Ingreso input --}}

        <div class="row mt-4">
            <div class="col-6 text-end">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
            <div class="col-6">
                <button type="button" class="btn btn-primary" onclick="enviarFormEditar('responsables', {{ $responsable->id }})">Guardar</button>
            </div>
        </div>
    </div>
</form>