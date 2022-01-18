<!doctype html>
<html lang="en">

<head>

     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('js/jquerymio.js') }}"></script>
    <script src="{{ asset('js/AjaxFormIo.js') }}"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,700&display=swap" rel="stylesheet">

    <!-- Ionic icons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    
    <title>Fimat</title>
    <input type="hidden" id="targeta_1" value="">
    <input type="hidden" id="targeta_2" value="">
    <input type="hidden" id="targeta_3" value="">
    <input type="hidden" id="targeta_4" value="">
    <input type="hidden" id="targeta_5" value="">
    <input type="hidden" id="targeta_6" value="">
    <input type="hidden" id="targeta_7" value="">
    <input type="hidden" id="layout_1" value="1">
    <input type="hidden" id="layout_2" value="2">
    <input type="hidden" id="layout_3" value="3">
</head>

<body>
    <div class="d-flex" id="content-wrapper">

        <!-- Sidebar -->
        <div id="sidebar-container" class="bg-primary">
            <div class="logo">
                <a href="{{url('/dashboard')}}">
                    <h4 class="text-light font-weight-bold mb-0">Fimat</h4>
                </a>
            </div>
            <div class="menu">
                <a href="#" class="d-block text-light p-3 border-0" id="inicio"><i class="icon ion-md-apps lead mr-2"></i>
                    Inicio</a>
                @if (empty(Session('piloto')) != 1)
                    <a href="#" class="d-block text-light p-3 border-0" id="piloto"><i class="icon ion-md-apps lead mr-2"></i>
                        Piloto</a>
                @endif
                @if (empty(Session('vacasional')) != 1)
                    <a href="#" class="d-block text-light p-3 border-0" id="vacacional"><i class="icon ion-md-apps lead mr-2"></i>
                        Vacacional</a>
                @endif
                @if (Session('Informacion_general')[0]->tipoUsuario == 1)
                    <a href="#" class="d-block text-light p-3 border-0" id="cursos"><i class="icon ion-md-people lead mr-2"></i>
                        Cursos</a>

                    <a href="#" class="d-block text-light p-3 border-0" id="asignaturas"><i class="icon ion-md-stats lead mr-2"></i>
                        Asignaturas</a>
                    <a href="#" class="d-block text-light p-3 border-0" id="registro"><i class="icon ion-md-person lead mr-2"></i>
                        Registro</a>
                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#material_educativo">Agregar Material</button>
                @endif
                    <li id="biologia" style="display: none;">
                        <a href="#" class="d-block text-light p-3 border-0">Biologia</a>
                    </li>
                    <li id="quimica" style="display: none;">
                        <a href="#" class="d-block text-light p-3 border-0">Quimica</a>
                    </li>
                    <li id="fisica" style="display: none;">
                        <a href="#" class="d-block text-light p-3 border-0">Fisica</a>
                    </li>
                    <li id="sociales" style="display: none;">
                        <a href="#" class="d-block text-light p-3 border-0" >Sociales</a>
                    </li>
                    <li id="matematicas" style="display: none;">
                        <a href="#" class="d-block text-light p-3 border-0">Matematicas</a>
                    </li>
                    <li id="ingles" style="display: none;">
                        <a href="#" class="d-block text-light p-3 border-0">Ingles</a>
                    </li>
                    <li id="lectura" style="display: none;">
                        <a href="#" class="d-block text-light p-3 border-0">Lectura</a>
                    </li>
            </div>
        </div>
        <!-- Fin sidebar -->

        <div class="w-100">

            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container">
        
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
        
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                      <li class="nav-item dropdown" style="margin-top: 5px; font-weight: bold;">
                        {{ Session('Informacion_general')[0]->NAME }}
                      </li>
                      <li class="nav-item dropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Salir') }}
                            <i class="fas fa-sign-out-alt"></i>
                        </a>
                      </li>
                    </ul>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                  </div>
                </div>
              </nav>
          
        <!-- Page Content -->
        <div id="content" class="bg-grey w-100">

            {{-- <section class="bg-light py-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 col-md-8">
                        <h1 class="font-weight-bold mb-0">Bienvenido {{ Session('Informacion_general')[0]->NAME }}</h1>
                        <p class="lead text-muted">Revisa la última información</p>
                        </div>
                    </div>
                </div>
            </section> --}}
            
            {{-- <main class="py-4">
                @yield('content')
            </main> --}}
            
            <div id="cargar-contenido"></div>
            
            @include('modulos.agregar_material')

        </div>

        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('js/agregar_material.js') }}"></script>
    {{-- <script src="{{ asset('js/asignatura.js') }}"></script>
    <script src="{{ asset('js/cursos.js') }}"></script> --}}
    <script src="{{ asset('js/menu.js') }}"></script>
    

    <script>
        $(document).ready(function () {
            // alert("layout");
        });
    </script>
</body>

</html>