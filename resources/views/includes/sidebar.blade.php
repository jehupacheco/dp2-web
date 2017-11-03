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
                        <a href="{{url('/')}}">
                            <i class="fa fa-dashboard"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/clientes')}}">
                            <i class="fa fa-user"></i>
                            Clientes
                        </a>
                    </li>

                    <li><a><i class="fa fa-bus"></i> Vehiculos <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            @foreach($all_organizations as $org)
                                <li><a href="{{url('/vehiculos/'.$org->id.'/lista')}}">Vehículo {{$org->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li>
                        <!-- <a href="{{url('/alquiler/index')}}"> -->
                        <a href="{{url('/')}}">
                            <i class="fa fa-money" aria-hidden="true"></i>
                            Alquiler
                        </a>
                    </li>
                    <li><a><i class="fa fa-bar-chart"></i> Reportes <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#">Reporte de Clientes</a></li>
                            <li><a href="#">Reporte de Recorridos</a></li>
                            <li><a href="#">Reporte de Historial de Alertas</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-cog"></i> Seguridad <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{url('/usuarios/nuevo')}}">Crear usuario</a></li>
                            <li><a href="#">Roles</a></li>
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
