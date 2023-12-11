{{-- el boton esta en el sidebar --}}
<div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
  <div class="offcanvas-header">
        <div class="text-center">
            <img class="" src="{{ asset('img/Logo Ministerio Cultura Footer.png') }}" height="70">
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="card-img-overlay" style="height: 0px; width:0px;">
    <div>
        <button class="btn btn-offcanvas-dismiss pt-3 mt-5 d-flex justify-content-end" type="button" data-bs-dismiss="offcanvas" aria-label="Close"><img src="{{asset('/img/Flecha cerrar Menú.png')}}" alt=""></button>
    </div>
  </div>
  <div class="offcanvas-body contenedor p-0">
        <div class="mt-4 ms-1 ps-4 p-3">
            <a class="link-offcanvas" href="{{ route('patrimonio.index') }}"role="button">
              <h5 class="mb-0"><img class="me-2" src="{{ asset('/img/Ícono Cultura.png') }}" alt="Panel">Listado Patrimonial</h5>
            </a>
        </div>
        <div class="collapse">
            <div class="">
            </div>
        </div>
        <div class=" ms-1 ps-4 p-3">
            <a class="link-offcanvas" data-bs-toggle="collapse" href="#collapseDependencia" role="button" aria-expanded="false" aria-controls="collapseExample">
                <h5 class="mb-0"><img class="me-2" src="{{ asset('/img/Ícono Institución.png') }}" alt="Panel"> Patrimonio</h5>
            </a>
        </div>
        <div class="collapse" id="collapseDependencia">
            <div class="">
                <a class="links-texto link-offcanvas d-flex justify-content-between" href="{{ route('patrimonio.create') }}">Alta Patrimonial</a>
                <a class="links-texto link-offcanvas d-flex justify-content-between" href="">Alta Masiva Patrimonial</a>
                <a class="links-texto link-offcanvas d-flex justify-content-between" href="">Transferencia Patrimonial</a>
                <a class="links-texto link-offcanvas d-flex justify-content-between" href="">Estados de Transferencia</a>
                <a class="links-texto link-offcanvas d-flex justify-content-between" href="">Baja Patrimonial</a>
                <a class="links-texto link-offcanvas d-flex justify-content-between" href="">Amortización</a>
                <a class="links-texto link-offcanvas d-flex justify-content-between" href="">Remitos</a>
                <a class="links-texto link-offcanvas d-flex justify-content-between" href="">Resumen Ejecucion Anual</a>

                {{-- <a class="links-texto link-offcanvas d-flex justify-content-between" href="">Listado de Bajas</a>
                <a class="links-texto link-offcanvas d-flex justify-content-between" href="">Relevamiento</a>
                <a class="links-texto link-offcanvas d-flex justify-content-between" href="">Estado de Relevamiento</a>
                <a class="links-texto link-offcanvas d-flex justify-content-between" href="">Historico</a>
                <a class="links-texto link-offcanvas d-flex justify-content-between" href="">Importar desde Excel</a>
                <a class="links-texto link-offcanvas d-flex justify-content-between" href="">Generar Excel para Importar</a>
                <a class="links-texto link-offcanvas d-flex justify-content-between" href="">Dependencias</a> --}}
            </div>
        </div>
        <div class=" ms-1 ps-4 p-3">
            <a class="link-offcanvas" data-bs-toggle="collapse" href="#collapseTipoBien" role="button" aria-expanded="false" aria-controls="collapseExample">
                <h5 class="mb-0"><img class="me-2" src="{{ asset('/img/Ícono Escritura.png') }}" alt="Panel"> Reportes</h5>
            </a>
        </div>
        <div class="collapse" id="collapseTipoBien">
            <div class="">
            </div>
        </div>
        <div class=" ms-1 ps-4 p-3">
            <a class="link-offcanvas" data-bs-toggle="collapse" href="#collapseProveedor" role="button" aria-expanded="false" aria-controls="collapseExample">
                <h5 class="mb-0"><img class="me-2" src="{{ asset('/img/Ícono Caja.png') }}" alt="Panel"> Proveedor</h5>
            </a>
        </div>
        <div class="collapse" id="collapseProveedor">
            <div class="">
            </div>
        </div>
        <div class=" ms-1 ps-4 p-3">
            <a class="link-offcanvas" data-bs-toggle="collapse" href="#collapseItems" role="button" aria-expanded="false" aria-controls="collapseExample">
                <h5 class="mb-0"><img class="me-2" src="{{ asset('/img/Ícono Calendario.png') }}" alt="Panel"> Ìtems</h5>
            </a>
        </div>
        <div class="collapse" id="collapseItems">
            <div class="">
            </div>
        </div>
        <div class=" ms-1 ps-4 p-3">
            <a class="link-offcanvas" data-bs-toggle="collapse" href="#collapseAdministracion" role="button" aria-expanded="false" aria-controls="collapseExample">
                <h5 class="mb-0"><img class="me-2" src="{{ asset('/img/Ícono Usuarios.png') }}" alt="Panel"> Administración</h5>
            </a>
        </div>
        <div class="collapse" id="collapseAdministracion">
            <div class=" ms-1 ps-4 p-3 pt-0">
                <div class=" ms-1 ps-4 p-3 pt-0">
                    <a class="link-offcanvas" data-bs-toggle="collapse" href="#collapseDatosMaestros" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <h5 class="mb-0"> Datos Maestros</h5>
                    </a>
                </div>
                <div class="collapse" id="collapseDatosMaestros">
                    <div class="">
                        <a class="links-texto link-offcanvas d-flex justify-content-between" href="{{ route('ubicaciones.index') }}">Ubicacion/Direccion</a>
                        <a class="links-texto link-offcanvas d-flex justify-content-between" href="{{ route('direcciones.index') }}">Direcciones</a>
                        <a class="links-texto link-offcanvas d-flex justify-content-between" href="{{ route('tipos-baja.index') }}">Tipos de Baja</a>
                        <a class="links-texto link-offcanvas d-flex justify-content-between" href="{{ route('tipos-bien.index') }}">Tipos de Bien</a>
                        <a class="links-texto link-offcanvas d-flex justify-content-between" href="{{ route('tipos-ingreso.index') }}">Tipos de Ingreso</a>
                        <a class="links-texto link-offcanvas d-flex justify-content-between" href="{{ route('tipos-asignacion.index') }}">Tipos de Asignacion</a>
                        <a class="links-texto link-offcanvas d-flex justify-content-between" href="{{ route('tipos-responsable.index') }}">Tipos de Responsable</a>
                        <a class="links-texto link-offcanvas d-flex justify-content-between" href="{{ route('responsables.index') }}">Responsables</a>
                        <a class="links-texto link-offcanvas d-flex justify-content-between" href="{{ route('proveedores.index')}}">Proveedores</a>
                        <a class="links-texto link-offcanvas d-flex justify-content-between" href="{{ route('tipos-remito.index') }}">Tipos de Remito</a>
                        <a class="links-texto link-offcanvas d-flex justify-content-between" href="{{ route('tipos-estado.index') }}">Tipos de Estado</a>
                    </div>
                </div>
            </div>
        </div>
  </div>
</div>
