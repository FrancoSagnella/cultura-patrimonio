@extends('index')
@push('styles')
@endpush
@section('page')
    <div class="container border border-3 mt-5 mb-5">
        {{-- Menu --}}
        <div class="row py-4 text-center border-bottom border-3">

            {{-- Menu Patrimonio --}}
            <div class="col-2 px-0 padre-desplegable">
                <div class="desplegable w-100">
                    <div class="pb-4">PATRIMONIO</div>
                    <div class="links border border-3">
                        <a class="links-texto" href="{{ route('patrimonio.index') }}">Listado Patrimonial</a>
                        <a class="links-texto" href="{{ route('patrimonio.create') }}">Alta Patrimonial</a>
                        <a class="links-texto" href="">Listado de Bajas</a>
                        <a class="links-texto" href="">Transferencia</a>
                        <a class="links-texto" href="">Estado de Transferencia</a>
                        <a class="links-texto" href="">Relevamiento</a>
                        <a class="links-texto" href="">Estado de Relevamiento</a>
                        <a class="links-texto" href="">Historico</a>
                        <a class="links-texto" href="">Amortizacion</a>
                        <a class="links-texto" href="">Remitos</a>
                        <a class="links-texto" href="">Resumen Ejecucion Anual</a>
                        <a class="links-texto" href="">Importar desde Excel</a>
                        <a class="links-texto" href="">Generar Excel para Importar</a>
                    </div>
                </div>
            </div>

            {{-- Menu Dependencia --}}
            <div class="col-2 px-0 padre-desplegable">
                <div class="desplegable w-100">
                    <div class="pb-4">DEPENDENCIA</div>
                    <div class="links border border-3">
                        <a class="links-texto" href="">Listado de Dependencias</a>
                        <a class="links-texto" href="">Alta Dependencia</a>
                        <a class="links-texto" href="">Listado de Responsables</a>
                        <a class="links-texto" href="">Alta de Responsables</a>
                    </div>
                </div>
            </div>

            {{-- Menu Tipo de Bien --}}
            <div class="col-2 px-0 padre-desplegable">
                <div class="desplegable w-100">
                    <div class="pb-4">TIPO DE BIEN</div>
                    <div class="links border border-3">
                        <a class="links-texto" href="">Listado Tipo de Bien</a>
                        <a class="links-texto" href="">Alta Tipo de Bien</a>
                    </div>
                </div>
            </div>

            {{-- Menu Proveedor --}}
            <div class="col-2 px-0 padre-desplegable">
                PROVEEDOR
            </div>

            {{-- Menu Administracion --}}
            <div class="col-2 px-0 padre-desplegable">
                <div class="desplegable w-100">
                    <div class="pb-4">ADMINISTRACION</div>
                    <div class="links border border-3">
                        <a class="links-texto" href="">Usuarios Gerenciales</a>
                        <a class="links-texto" href="">Grupos</a>
                        <a class="links-texto" href="">Permisos</a>
                    </div>
                </div>
            </div>

            {{-- Menu Items --}}
            <div class="col-2 px-0 padre-desplegable">
                <div class="desplegable w-100">
                    <div class="pb-4">ITEMS</div>
                    <div class="links border border-3">
                        <a class="links-texto" href="">Listado Tipo de Baja</a>
                        <a class="links-texto" href="">Alta Tipo de Baja</a>
                        <a class="links-texto" href="">Listado Tipo de Bien</a>
                        <a class="links-texto" href="">Alta Tipo de Bien</a>
                        <a class="links-texto" href="">Listado Tipo de Asignacion</a>
                        <a class="links-texto" href="">Alta Tipo de Asignacion</a>
                        <a class="links-texto" href="">Listado Tipo de Responsable</a>
                        <a class="links-texto" href="">Alta Tipo de Responsable</a>
                        <a class="links-texto" href="">Listado Tipo de Remito</a>
                        <a class="links-texto" href="">Alta tipo de Remito</a>
                        <a class="links-texto" href="">Listado de Universo</a>
                        <a class="links-texto" href="">Alta de Universo</a>
                        <a class="links-texto" href="">Listado de Proveedores</a>
                        <a class="links-texto" href="">Alta de Proveedores</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Content --}}
        <div class="row text-center">

            @yield('content')

        </div>
    </div>
@endsection
