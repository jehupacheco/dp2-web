<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ url('/') }}" class="site_title"><i class="fa fa-paw"></i> <span>AutómataPucpSystem</span></a>
        </div>
        
        <div class="clearfix"></div>
        
        <!-- menu profile quick info -->
        <div class="profile">
            <div class="profile_pic">
                <img src="{{ Gravatar::src(Auth::user()->email) }}" alt="Avatar of {{ Auth::user()->name }}" class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Bienvenido,</span>
                <h2>{{ Auth::user()->name }}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->
        
        <br />
        
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>Menú</h3>
                <ul class="nav side-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <i class="fa fa-dashboard"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/usuarios')}}">
                            <i class="fa fa-user"></i>
                            Usuarios
                        </a>
                    </li>

                    <li><a><i class="fa fa-bus"></i> Vehiculos <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            
                            <li><a href="{{url('/autos/tipo/1/lista')}}">Vehículo Jardinero</a></li>
                            <li><a href="{{url('/autos/tipo/3/lista')}}">Vehículo Vendedor</a></li>    
                            <li><a href="{{url('/autos/tipo/2/lista')}}">Vehículo Cardiopatía</a></li>
                            <li><a href="{{url('/autos/tipo/4/lista')}}">Vehículo Eco-amigable</a></li>
                            <li><a href="{{url('/autos/tipo/5/lista')}}">Vehículo Transporte Urbano 1</a></li>
                            <li><a href="{{url('/autos/tipo/6/lista')}}">Vehículo Transporte Urbano 2</a></li>

                        </ul>
                    </li>
                    <li><a><i class="fa fa-bar-chart"></i> Reportes <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#">Reporte de Clientes</a></li>
                            <li><a href="#">Reporte de Recorridos</a></li>
                            <li><a href="#">Reporte de Historial de Alertas</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{url('/estacionamiento')}}">
                            <i class="fa fa-car"></i>Estacionamiento
                        </a>
                    </li>
                </ul>
            </div>
            <!-- <div class="menu_section">
                <h3>Group 2</h3>
                <ul class="nav side-menu">
                    <li>
                        <a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li>
                                <a href="#">Level One</a>
                                <li>
                                    <a>Level One<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li class="sub_menu">
                                            <a href="#">Level Two</a>
                                        </li>
                                        <li>
                                            <a href="#">Level Two</a>
                                        </li>
                                        <li>
                                            <a href="#">Level Two</a>
                                        </li>
                                    </ul>
                                </li>
                            <li>
                                <a href="#">Level One</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div> -->
        
        </div>
        <!-- /sidebar menu -->
        
        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ url('/logout') }}">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>
