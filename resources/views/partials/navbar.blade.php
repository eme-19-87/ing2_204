<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Cuotas
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('listar_cuotas_alumnos',2)}} ">Pago Cuota</a></li>
              <li><a class="dropdown-item" href="#">Lista Pagos</a></li>
            </ul>
          </li>
         
        </ul>
      </div>
    </div>
  </nav>