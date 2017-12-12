<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ url('/') }}" class="site_title"><i class="fa fa-home"></i> <span>AutómataPucpSystem</span></a>
        </div>
        
        <div class="clearfix"></div>
        
        <!-- menu profile quick info -->
        <div class="profile">
            <div class="profile_pic">
                <img src="{{ Gravatar::src(Auth::user()->email) }}" alt="Avatar of {{ Auth::user()->name }}" class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Adios mundo !!!,</span>
                <h2>{{ Auth::user()->name }}</h2>
                <?php $date=date('d-m-Y');; ?>
                <span>{{$date}}</span>
            </div>
        </div>
        <!-- /menu profile quick info -->
        
        <br />
        
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>Menú</h3>
                <ul class="nav side-menu">

                    @can('Dashboard')
                    <li>
                        <a href="{{url('/')}}">
                            <i class="fa fa-dashboard"></i>
                            Dashboard
                        </a>
                    </li>
                    @endcan
                    @can('Organizaciones')
                    <li>
                        <a href="{{route('organizations.index')}}">
                            <i class="fa fa-building"></i>
                            Organizaciones
                        </a>
                    </li>
                    @endcan
                    @can('Clientes')
                    <li>
                        <a href="{{url('/clientes')}}">
                            <i class="fa fa-user"></i>
                            Clientes
                        </a>
                    </li>
                    @endcan
                    @if(auth()->user()->can('Vehículos - Todas las Organizaciones'))
                    <li>
                        <a>
                            <i class="fa fa-bus"></i> Vehiculos 
                            <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu">
                            @foreach($all_organizations as $org)
                                @if($org->name != "Estacionamiento")
                                <li><a href="{{url('/vehiculos/'.$org->id.'/lista')}}">Vehículo {{$org->name}}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                    @elseif(auth()->user()->hasAnyPermission(['Vehículos para pacientes de Cardiopatía', 
                                                 'Vehículos para la Jardinería', 
                                                 'Vehículos para Ventas',
                                                 'Vehículos Eco-amigables',
                                                 'Vehículos para Trasporte Urbano 1',
                                                 'Vehículos para Trasporte Urbano 2']))
                        <li>
                            <a>
                                <i class="fa fa-bus"></i> Vehiculos 
                                <span class="fa fa-chevron-down"></span>
                            </a>
                            <ul class="nav child_menu">
                            @foreach($all_organizations as $org)
                                @if($org->name == "Cardiopatia" && auth()->user()->can('Vehículos para pacientes de Cardiopatía'))
                                <li><a href="{{url('/vehiculos/'.$org->id.'/lista')}}">Vehículo {{$org->name}}</a></li>
                                @endif
                                @if($org->name == "Jardineria" && auth()->user()->can('Vehículos para la Jardinería'))
                                <li><a href="{{url('/vehiculos/'.$org->id.'/lista')}}">Vehículo {{$org->name}}</a></li>
                                @endif
                                @if($org->name == "Ventas" && auth()->user()->can('Vehículos para Ventas'))
                                <li><a href="{{url('/vehiculos/'.$org->id.'/lista')}}">Vehículo {{$org->name}}</a></li>
                                @endif
                                @if($org->name == "Eco-amigable" && auth()->user()->can('Vehículos Eco-amigables'))
                                <li><a href="{{url('/vehiculos/'.$org->id.'/lista')}}">Vehículo {{$org->name}}</a></li>
                                @endif
                                @if($org->name == "Transporte Urbano 1" && auth()->user()->can('Vehículos para Trasporte Urbano 1'))
                                <li><a href="{{url('/vehiculos/'.$org->id.'/lista')}}">Vehículo {{$org->name}}</a></li>
                                @endif
                                @if($org->name == "Transporte Urbano 2" && auth()->user()->can('Vehículos para Trasporte Urbano 2'))
                                <li><a href="{{url('/vehiculos/'.$org->id.'/lista')}}">Vehículo {{$org->name}}</a></li>
                                @endif
                            @endforeach
                            </ul>
                        </li>
                    @elseif(auth()->user()->can('Vehículos - Solo su Organización'))
                    <li>
                        <a href="{{url('/vehiculos/'.auth()->user()->organization_id.'/lista')}}">
                            <i class="fa fa-bus"></i> Vehiculos 
                        </a>
                    </li>
                    @endif




                    @if(auth()->user()->can('Alquileres'))
                    <li>
                        <!-- <a href="{{url('/alquiler/index')}}"> -->
                        <a href="{{url('/alquileres/index')}}">
                            <i class="fa fa-money" aria-hidden="true"></i>
                            Alquileres
                        </a>
                    </li>
                    @endif


                    @if(auth()->user()->hasAnyPermission(['Reportes de Recorridos', 
                                                 'Reportes de Clientes', 
                                                 'Reportes de Sensores',
                                                 'Reportes de Historial de Alertas']))
                    <li><a><i class="fa fa-bar-chart"></i> Reportes <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            @if(auth()->user()->can('Reportes de Recorridos'))
                            <li><a href="{{url('/reportes/recorrido/filtro')}}">Reporte de Recorridos</a></li>
                            @endif
                            @if(auth()->user()->can('Reportes de Clientes'))
                            <li><a href="{{url('/reportes/filtrosReportes')}}">Reporte de Clientes</a></li>
                            @endif
                            @if(auth()->user()->can('Reportes de Sensores'))
                            <li><a href="{{url('/reportes/sensores')}}">Reporte de Sensores</a></li>
                            @endif
                            @if(auth()->user()->can('Reportes de Historial de Alertas'))
                            <li><a href="#">Reporte de Historial de Alertas</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                    @if(auth()->user()->can('Seguridad'))
                    <li><a><i class="fa fa-cog"></i> Seguridad <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{url('/usuarios/nuevo')}}">Crear usuario</a></li>
                            <li><a href="{{url('/cambiar/password')}}">Cambiar Contraseña</a></li>
                            <li><a href="{{url('/roles')}}">Roles</a></li>
                        </ul>
                    </li>
                    @endif
                    @if(auth()->user()->can('Configuración'))
                    <li>
                        <a href="{{url('/vehiculos/Configuracion')}}">
                            <i class="fa fa-asterisk"></i>Configuracion
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->can('Estacionamiento'))
                    <li>
                        <a href="{{url('/estacionamiento')}}">
                            <i class="fa fa-car"></i>Estacionamiento
                        </a>
                    </li>
                    @endif
                    {{--  <li>
                        <a href="{{url('/autos/tipo/6/lista')}}">
                            <i class="fa fa-car"></i>Vehículo transporte urbano
                        </a>
                    </li>  --}}
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
