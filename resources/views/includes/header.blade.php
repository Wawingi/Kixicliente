<header id="topnav">
    <!-- Inicio TopBar -->
    <div style="background-color:#0f5b3b" class="navbar-custom">
        <div class="container-fluid">

            <!-- LOGO -->
            <div class="logo-box">
                <a href="{{ url('home') }}" class="logo text-center">
                    <span class="logo-lg">
                        <img src="{{ url('images/logoIN.png') }}" alt="" height="48">
                        <!-- <span class="logo-lg-text-light">Xeria</span> -->
                    </span>
                    <span class="logo-sm">
                        <!-- <span class="logo-sm-text-dark">X</span> -->
                        <img src="{{ url('images/logoIN.png') }}" alt="" height="24">
                    </span>
                </a>
            </div>

            <ul class="list-unstyled topnav-menu float-right mb-0">

                <li class="dropdown notification-list">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle nav-link">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </li>

                <li id="notificacaoTable" class="dropdown notification-list">
                    <!--Notificações serão exibidas aqui-->
                </li>
        
                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{ url('images/fotos/'.Session::get('user')->foto) }}" alt="user-image" class="rounded-circle">
                        <span class="pro-user-name ml-1">
                        {{Session::get('user')->name}} <i class="mdi mdi-chevron-down"></i><br>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Seja bem vindo !</h6>
                        </div>

                        <!-- item-->
                        <a href="{{'myPerfil'}}" class="dropdown-item notify-item">
                            <i class="remixicon-account-circle-line"></i>
                            <span>Meu Perfil</span>
                        </a>

                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        <a class="dropdown-item notify-item" href="{{ url('logout') }}">
                            <i class="remixicon-logout-box-line"></i>
                            <span>Sair</span>
                        </a>

                    </div>
                </li>
            </ul>

            <div class="clearfix"></div>
        </div>
    </div>
    <!-- Fim Topbar -->

    <!-- Inicio MenuBar -->
    <div class="topbar-menu">
        <div class="container-fluid">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">

                    <li class="has-submenu">
                        <a href="{{ url('home') }}">
                            <i class="remixicon-home-4-fill"></i>Inicio
                        </a>
                    </li>

                    <li class="has-submenu">
                        <a href="#">
                            <i class="fas fa-users"></i>Clientes <div class="arrow-down"></div>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="{{ url('consultarCliente') }}"><i class="fas fa-search mr-1"></i>Consultar clientes</a>
                            </li>
                            <li>
                                <a href="#" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#exampleModalScrollable"><i class="fas fa-money-check-alt mr-1"></i>CIRC Interno</a>
                            </li>
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="#">
                            <i class="fas fa-cogs"></i>Configurações<div class="arrow-down"></div>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="{{ url('uploadClientes') }}"><i class="fas fa-file-import mr-1"></i>Carregar Dados</a>
                            </li>
                        </ul>
                    </li>
                  
                    <li class="has-submenu float-right">
                        <a href="#" onclick="window.history.back();">
                            <i class="fas fa-arrow-left"></i>Voltar
                        </a>
                    </li>

                </ul>
                <!-- End navigation menu -->

                <div class="clearfix"></div>
            </div>
            <!-- end #navigation -->
        </div>
        <!-- end container -->
    </div>
    <!-- Fim MenuBar -->
</header>