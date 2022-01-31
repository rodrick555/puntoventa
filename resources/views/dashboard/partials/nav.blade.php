<body class="nav-open g-sidenav-show g-sidenav-pinned" style="min-height: 100vh;">
    <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scroll-wrapper scrollbar-inner scroll-content scroll-scrolly_visible" style="position: relative;">
            <div class="scrollbar-inner scroll-content scroll-scrolly_visible"
                style="height: auto; margin-bottom: 0px; margin-right: 0px; max-height: 544px;">
                <!-- Brand -->
                <div class="sidenav-header  align-items-center">
                    <a class="navbar-brand" href="javascript:void(0)">
                        <img src="../assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
                    </a>
                </div>
                <div class="navbar-inner">
                    <!-- Collapse -->
                    <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                        <!-- Nav items -->
                        <ul class="navbar-nav">



                            <li class="nav-item">
                                <a class="nav-link active" href="#venta" data-toggle="collapse" role="button"
                                    aria-expanded="true" aria-controls="venta">
                                    <i class="ni ni-chart-pie-35" style="color: #d62534;"></i>
                                    <h3>
                                        <span class="nav-link-text" style="color: #d62534;">
                                            Ventas y sucursales
                                        </span>
                                    </h3>
                                </a>
                                <div class="collapse" id="venta">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('ventas') }}">
                                                <h4>
                                                    Ventas
                                                </h4>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('sucursales') }}">
                                                <h4>
                                                    Proveedores
                                                </h4>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>



                            <li class="nav-item">
                                <a class="nav-link active" href="#proveedore" data-toggle="collapse" role="button"
                                    aria-expanded="true" aria-controls="proveedore">
                                    <i class="ni ni-delivery-fast" style="color: #0a7710;"></i>
                                    <h3>
                                        <span class="nav-link-text" style="color: #0a7710;">
                                            Proveedores y Productos
                                        </span>
                                    </h3>
                                </a>
                                <div class="collapse" id="proveedore">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('proveedores') }}">
                                                <h4>
                                                    Proveedores
                                                </h4>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('productos') }}">
                                                Productos
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            

                            <li class="nav-item">
                                <a class="nav-link active" href="#user" data-toggle="collapse" role="button"
                                    aria-expanded="true" aria-controls="user">
                                    <i class="ni ni-single-02" style="color: #1c1ea0;"></i>
                                    <h3><span class="nav-link-text" style="color:  #1c1ea0;">
                                            Usuarios y Roles
                                        </span>
                                    </h3>
                                </a>
                                <div class="collapse" id="user">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('roles.index') }}">
                                                <h4>
                                                    Roles
                                                </h4>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('usuarios') }}">
                                                <h4>
                                                    Usuarios
                                                </h4>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>


                    </div>
                    <!-- Divider -->
                    <hr class="my-3">
                    <!-- Heading -->
                    <h6 class="navbar-heading p-0 text-muted">
                        <span class="docs-normal">Contacto</span>
                    </h6>

                    <div class="d-none d-sm-block ml-auto">
                        <ul class="navbar-nav ct-navbar-nav flex-row align-items-center">
                            <li class="nav-item">
                                <a class="nav-link nav-link-icon" href="https://www.facebook.com/macrobyte.tja/"
                                    target="_blank">
                                    <i class="fab fa-facebook-square"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-link-icon" href="https://wa.link/mzxdfw" target="_blank">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            </li>
                            <a class="nav-link nav-link-icon" href="http://macrobyte.site/" target="_blank">
                                <i class="fab fa-dribbble"></i>
                            </a>
                        </ul>
                    </div>

                </div>
            </div>
    </nav>
