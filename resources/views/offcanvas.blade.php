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
            <a class="link-offcanvas" data-bs-toggle="collapse" href="#collapsePatrimonio" role="button" aria-expanded="false" aria-controls="collapseExample">
              <h5 class="mb-0"><img class="me-2" src="{{ asset('/img/Ícono Cultura Blanco.png') }}" alt="Panel">Patrimonio</h5>
            </a>
        </div>
        <div class="collapse" id="collapsePatrimonio">
            <div class="">
                <a class="links-texto link-offcanvas d-flex justify-content-between" href="{{ route('patrimonio.index') }}">Listado Patrimonial</a>
                <a class="links-texto link-offcanvas d-flex justify-content-between" href="{{ route('patrimonio.create') }}">Alta Patrimonial</a>
                <a class="links-texto link-offcanvas d-flex justify-content-between" href="">Listado de Bajas</a>
                <a class="links-texto link-offcanvas d-flex justify-content-between" href="">Transferencia</a>
                <a class="links-texto link-offcanvas d-flex justify-content-between" href="">Estado de Transferencia</a>
                <a class="links-texto link-offcanvas d-flex justify-content-between" href="">Relevamiento</a>
                <a class="links-texto link-offcanvas d-flex justify-content-between" href="">Estado de Relevamiento</a>
                <a class="links-texto link-offcanvas d-flex justify-content-between" href="">Historico</a>
                <a class="links-texto link-offcanvas d-flex justify-content-between" href="">Amortizacion</a>
                <a class="links-texto link-offcanvas d-flex justify-content-between" href="">Remitos</a>
                <a class="links-texto link-offcanvas d-flex justify-content-between" href="">Resumen Ejecucion Anual</a>
                <a class="links-texto link-offcanvas d-flex justify-content-between" href="">Importar desde Excel</a>
                <a class="links-texto link-offcanvas d-flex justify-content-between" href="">Generar Excel para Importar</a>
            </div>
        </div>
        <div class=" ms-1 ps-4 p-3">
            <a class="link-offcanvas" data-bs-toggle="collapse" href="#collapseDependencia" role="button" aria-expanded="false" aria-controls="collapseExample">
                <h5 class="mb-0"><img class="me-2" src="{{ asset('/img/Ícono Institución.png') }}" alt="Panel"> Dependencia</h5>
            </a>
        </div>
        <div class="collapse" id="collapseDependencia">
            <div class="">
            </div>
        </div>
        <div class=" ms-1 ps-4 p-3">
            <a class="link-offcanvas" data-bs-toggle="collapse" href="#collapseAdministracion" role="button" aria-expanded="false" aria-controls="collapseExample">
                <h5 class="mb-0"><img class="me-2" src="{{ asset('/img/Ícono Escritura.png') }}" alt="Panel"> Tipo de Bien</h5>
            </a>
        </div>
        <div class="collapse" id="collapseAdministracion">
            <div class="">
            </div>
        </div>
        <div class=" ms-1 ps-4 p-3">
            <a class="link-offcanvas" data-bs-toggle="collapse" href="#collapseAdministracion" role="button" aria-expanded="false" aria-controls="collapseExample">
                <h5 class="mb-0"><img class="me-2" src="{{ asset('/img/Ícono Caja.png') }}" alt="Panel"> Proveedor</h5>
            </a>
        </div>
        <div class="collapse" id="collapseAdministracion">
            <div class="">
            </div>
        </div>
        <div class=" ms-1 ps-4 p-3">
            <a class="link-offcanvas" data-bs-toggle="collapse" href="#collapseAdministracion" role="button" aria-expanded="false" aria-controls="collapseExample">
                <h5 class="mb-0"><img class="me-2" src="{{ asset('/img/Ícono Usuarios.png') }}" alt="Panel"> Administración</h5>
            </a>
        </div>
        <div class="collapse" id="collapseAdministracion">
            <div class="">
                <a class="links-texto link-offcanvas d-flex justify-content-between" href="{{ route('ubicaciones.index') }}">Ubicaciones</a>
                <a class="links-texto link-offcanvas d-flex justify-content-between" href="{{ route('direcciones.index') }}">Direcciones</a>
                <a class="links-texto link-offcanvas d-flex justify-content-between" href="">Dependencias</a>
                <a class="links-texto link-offcanvas d-flex justify-content-between" href="{{ route('proveedores.index')}}">Proveedores</a>
                <a class="links-texto link-offcanvas d-flex justify-content-between" href="">Tipos de Baja</a>
                <a class="links-texto link-offcanvas d-flex justify-content-between" href="{{ route('tipos-ingreso.index') }}">Tipos de Ingreso</a>
                <a class="links-texto link-offcanvas d-flex justify-content-between" href="{{ route('tipos-bien.index') }}">Tipos de Bien</a>
                <a class="links-texto link-offcanvas d-flex justify-content-between" href="{{ route('tipos-asignacion.index') }}">Tipos de Asignacion</a>
                <a class="links-texto link-offcanvas d-flex justify-content-between" href="">Tipos de Responsable</a>
                <a class="links-texto link-offcanvas d-flex justify-content-between" href="">Tipos de Remito</a>
                <a class="links-texto link-offcanvas d-flex justify-content-between" href="">Universos</a>
            </div>
        </div>
        <div class=" ms-1 ps-4 p-3">
            <a class="link-offcanvas" data-bs-toggle="collapse" href="#collapseAdministracion" role="button" aria-expanded="false" aria-controls="collapseExample">
                <h5 class="mb-0"><img class="me-2" src="{{ asset('/img/Ícono Calendario.png') }}" alt="Panel"> Ìtems</h5>
            </a>
        </div>
        <div class="collapse" id="collapseAdministracion">
            <div class="">
            </div>
        </div>
  </div>
</div>