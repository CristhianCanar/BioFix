<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>{{ env('APP_NAME') }}</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="shortcut icon" href="{{ asset('img/icon.svg') }}" />

    <!-- Core JS Files -->
    <script src="{{ asset('atlantis/assets/js/core/jquery.3.2.1.min.js') }}"></script>
    <script src="{{ asset('atlantis/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('atlantis/assets/js/core/bootstrap.min.js') }}"></script>
    <!-- jQuery UI -->
    <script src="{{ asset('atlantis/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('atlantis/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>
    <!-- jQuery Scrollbar -->
    <script src="{{ asset('atlantis/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    <!-- Atlantis JS -->
    <script src="{{ asset('atlantis/assets/js/atlantis.min.js') }}"></script>
    <!-- Chart Circle -->
    <script src="{{ asset('atlantis/assets/js/plugin/chart-circle/circles.min.js') }}"></script>
    <!-- Chart JS-->
    <script src="{{ asset('atlantis/assets/js/plugin/chart.js/chart.min.js') }}"></script>
    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Sparkline -->
    <script src="{{ asset('atlantis/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>
    <!--JS personalizado-->
    <script src="{{ asset('js/admin.js') }}"></script>
    <!-- Fonts and icons -->
    <script src="{{ asset('atlantis/assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                    "simple-line-icons"
                ],
                urls: ["{{ asset('atlantis/assets/css/fonts.css') }}"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!--Select 2-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- CSS Files -->
    <link href="{{ asset('atlantis/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('atlantis/assets/css/atlantis.css') }}" rel="stylesheet">
    <!-- Estilos personalizados -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="main-header">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark2">

                <a href="" class="logo">
                    <div class="avatar-sm mr-4 ">
                        <img src="{{ asset('img/banner.svg') }}" class="navbar-brand" height="40">
                    </div>
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg" data-background-color="dark2">
                <div class="container-fluid">

                    <div class="collapse" id="search-nav">
                        <div class="user-box">
                            <div class="u-text">
                                <h2 style="color: white">Bienvenid@ {{ Auth::user()->nombre }}</h2>
                            </div>
                        </div>
                    </div>
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item dropdown hidden-caret">
                            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                                <i class="fas fa-user"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <div class="dropdown-user-scroll scrollbar-outer">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            Cerrar sesión
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">@csrf</form>
                                    </li>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>
        <!-- Sidebar -->
        <div class="sidebar sidebar-style-2" data-background-color="dark2">
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav nav-primary">

                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Estadísticas</h4>
                        </li>

                        <li class="nav-item {{ request()->is(['dashboard', '/']) ? 'active' : '' }}">
                            <a href="{{ route('dashboard') }}">
                                <i class="fas fa-home"></i>
                                <p>Tablero</p>
                            </a>
                        </li>

                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Equipos</h4>
                        </li>

                        <li class="nav-item {{ request()->routeIs('equipos.*') ? 'active' : '' }}">
                            <a data-toggle="collapse" href="#equipos">
                                <i class="fas fa-ruler-combined"></i>
                                <p>Gestionar equipos</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse {{ request()->routeIs('equipos.*') ? 'show' : '' }}" id="equipos">
                                <ul class="nav nav-collapse">
                                    <li class="{{ request()->routeIs('equipos.create') ? 'active' : '' }}">
                                        <a href="{{ route('equipos.create') }}">
                                            <span class="sub-item">Registrar equipo</span>
                                        </a>
                                    </li>
                                    <li class="{{ request()->routeIs('equipos.index') ? 'active' : '' }}">
                                        <a href="{{ route('equipos.index') }}">
                                            <span class="sub-item">Gestionar equipos</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        @can('responsables_equipos_ver')
                            <li class="nav-item {{ request()->routeIs('responsables_equipos.*') ? 'active' : '' }}">
                                <a data-toggle="collapse" href="#responsablesequipos">
                                    <i class="fas fa-users"></i>
                                    <p>Gestionar <br> responsables equi.</p>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse {{ request()->routeIs('responsables_equipos.*') ? 'show' : '' }}"
                                    id="responsablesequipos">
                                    <ul class="nav nav-collapse">
                                        @can('responsables_equipos_registrar')
                                            <li
                                                class="{{ request()->routeIs(['responsables_equipos.create', 'responsables_equipos.store']) ? 'active' : '' }}">
                                                <a href="{{ route('responsables_equipos.create') }}">
                                                    <span class="sub-item">Registrar responsable equipo</span>
                                                </a>
                                            </li>
                                        @endcan
                                        <li
                                            class="{{ request()->routeIs([
                                                'responsables_equipos.index',
                                                'responsables_equipos.show',
                                                'responsables_equipos.edit',
                                                'responsables_equipos.update',
                                                'responsables_equipos.destroy',
                                            ])
                                                ? 'active'
                                                : '' }}">
                                            <a href="{{ route('responsables_equipos.index') }}">
                                                <span class="sub-item">Gestionar responsables equipos</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @endcan

                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Empresas</h4>
                        </li>

                        <li class="nav-item {{ request()->routeIs('empresas.*') ? 'active' : '' }}">
                            <a data-toggle="collapse" href="#empresas">
                                <i class="fas fa-industry"></i>
                                <p>Gestionar empresas</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse {{ request()->routeIs('empresas.*') ? 'show' : '' }}"
                                id="empresas">
                                <ul class="nav nav-collapse">
                                    <li
                                        class="{{ request()->routeIs(['empresas.create', 'empresas.store']) ? 'active' : '' }}">
                                        <a href="{{ route('empresas.create') }}">
                                            <span class="sub-item">Registrar empresa</span>
                                        </a>
                                    </li>
                                    <li
                                        class="{{ request()->routeIs(['empresas.index', 'empresas.show', 'empresas.edit', 'empresas.update', 'empresas.destroy']) ? 'active' : '' }}">
                                        <a href="{{ route('empresas.index') }}">
                                            <span class="sub-item">Gestionar empresas</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        @can('responsables_mantenimientos_ver')
                            <li class="nav-section">
                                <span class="sidebar-mini-icon">
                                    <i class="fa fa-ellipsis-h"></i>
                                </span>
                                <h4 class="text-section">Mantenimientos</h4>
                            </li>

                            <li
                                class="nav-item {{ request()->routeIs('responsables_mantenimientos.*') ? 'active' : '' }}">
                                <a data-toggle="collapse" href="#responsablesmantenimientos">
                                    <i class="fas fa-users"></i>
                                    <p>Gestionar <br> responsables mant.</p>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse {{ request()->routeIs('responsables_mantenimientos.*') ? 'show' : '' }}"
                                    id="responsablesmantenimientos">
                                    <ul class="nav nav-collapse">
                                        @can('responsables_mantenimientos_registrar')
                                            <li
                                                class="{{ request()->routeIs(['responsables_mantenimientos.create', 'responsables_mantenimientos.store']) ? 'active' : '' }}">
                                                <a href="{{ route('responsables_mantenimientos.create') }}">
                                                    <span class="sub-item">Registrar responsable mantenimiento</span>
                                                </a>
                                            </li>
                                        @endcan
                                        <li
                                            class="{{ request()->routeIs([
                                                'responsables_mantenimientos.index',
                                                'responsables_mantenimientos.show',
                                                'responsables_mantenimientos.edit',
                                                'responsables_mantenimientos.update',
                                                'responsables_mantenimientos.destroy',
                                            ])
                                                ? 'active'
                                                : '' }}">
                                            <a href="{{ route('responsables_mantenimientos.index') }}">
                                                <span class="sub-item">Gestionar responsables mantenimientos</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @endcan


                        @can('usuarios_ver')
                            <li class="nav-section">
                                <span class="sidebar-mini-icon">
                                    <i class="fa fa-ellipsis-h"></i>
                                </span>
                                <h4 class="text-section">Usuarios</h4>
                            </li>

                            <li class="nav-item {{ request()->routeIs('usuarios.*') ? 'active' : '' }}">
                                <a data-toggle="collapse" href="#usuarios">
                                    <i class="fas fa-users-cog"></i>
                                    <p>Gestionar usuarios</p>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse {{ request()->routeIs('usuarios.*') ? 'show' : '' }}"
                                    id="usuarios">
                                    <ul class="nav nav-collapse">
                                        @can('usuarios_registrar')
                                            <li
                                                class="{{ request()->routeIs(['usuarios.create', 'usuarios.store']) ? 'active' : '' }}">
                                                <a href="{{ route('usuarios.create') }}">
                                                    <span class="sub-item">Registrar usuario</span>
                                                </a>
                                            </li>
                                        @endcan
                                        <li
                                            class="{{ request()->routeIs(['usuarios.index', 'usuarios.show', 'usuarios.edit', 'usuarios.update', 'usuarios.destroy']) ? 'active' : '' }}">
                                            <a href="{{ route('usuarios.index') }}">
                                                <span class="sub-item">Gestionar usuarios</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @endcan

                    </ul>
                </div>
            </div>
        </div>
        <div class="main-panel">
            <div class="content">
                @include('sweetalert::alert')
                @yield('content')
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                    </nav>
                    <div class="copyright ml-auto">
                        {{ now()->year }} © con❤️<a href="https://www.uniautonoma.edu.co" target="_blank"
                            style="text-decoration: none">Uniautónoma</a> v{{ ENV('APP_VERSION') }}
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>

</html>
