{{-- <div class="d-none d-md-flex flex-column flex-shrink-0 sidebar" > --}}
 <div class="flex-column flex-shrink-0 sidebar" >
     <ul class="nav nav-pills nav-flush flex-column mb-auto text-center h-100">
        <li class="mt-3 mb-5">
              <img class="me-2" src="{{ asset('/img/Logo Ministerio Cultura.png') }}" alt="Panel">
        </li>
        <li class="">
            <a href="{{ url('/') }}" class="nav-link py-3 btn-sidebar" aria-current="page" title="Panel" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
              <img class="me-2" src="{{ asset('/img/Ícono Cultura Blanco.png') }}" alt="Panel">
            </a>
        </li>
        <li class="">
            <a href="{{ url('/') }}" class="nav-link py-3 btn-sidebar" aria-current="page" title="Panel" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
              <img class="me-2" src="{{ asset('/img/Ícono Institución.png') }}" alt="Panel">
            </a>
        </li>
       <li class="">
        <a href="{{ url('/') }}" class="nav-link py-3 btn-sidebar" aria-current="page" title="Panel" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
          <img class="me-2" src="{{ asset('/img/Ícono Escritura.png') }}" alt="Panel">
        </a>
      </li>
      <li class="">
        <a href="{{ url('/') }}" class="nav-link py-3 btn-sidebar" aria-current="page" title="Panel" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
          <img class="me-2" src="{{ asset('/img/Ícono Caja.png') }}" alt="Panel">
        </a>
      </li>
      <li class="">
        <a href="{{ url('/') }}" class="nav-link py-3 btn-sidebar" aria-current="page" title="Panel" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
          <img class="me-2" src="{{ asset('/img/Ícono Usuarios.png') }}" alt="Panel">
        </a>
      </li>
      <li class="">
        <a href="{{ url('/') }}" class="nav-link py-3 btn-sidebar" aria-current="page" title="Panel" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
          <img class="me-2" src="{{ asset('/img/Ícono Calendario.png') }}" alt="Panel">
        </a>
      </li>
      <li class="mt-auto mb-2">
        <a href="{{ url('/') }}" class="nav-link py-3 btn-sidebar" aria-current="page" title="Panel" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
          <img class="me-2" src="{{ asset('/img/Ícono Login.png') }}" alt="Panel">
        </a>
      </li>
     </ul>
 </div>  
 <div class="card-img-overlay" style="height: 0px; width:0px;">
    <div>
        <button class="btn pt-3 mt-5 ps-4 ms-5" style="position: fixed;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><img src="{{asset('/img/Flecha abrir Menú.png')}}" alt=""></button>
    </div>
</div>
