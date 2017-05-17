                              <li class="nav-item active open">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-puzzle"></i>
                                    <span class="title">MANTENIMIENTO</span>
                                    <span class="selected"></span>
                                    <span class="arrow open"></span>
                                </a>
                                <ul class="sub-menu">
                                    @if(Auth::user()->idroles == 1)
                                    <li class="nav-item start">
                                        <a href="{!! url('usuarios') !!}" class="nav-link ">
                                            <i class="icon-bulb"></i>
                                            <span class="title">USUARIOS</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  start">
                                        <a href="{!! url('roles') !!}" class="nav-link ">
                                            <i class="icon-bulb"></i>
                                            <span class="title">ROLES</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  start">
                                        <a href="{!! url('procesos') !!}" class="nav-link ">
                                            <i class="icon-graph"></i>
                                            <span class="title">PROCESOS</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  start">
                                        <a href="{!! url('personal') !!}" class="nav-link ">
                                            <i class="icon-graph"></i>
                                            <span class="title">PERSONALES</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  start">
                                        <a href="{!! url('productos') !!}" class="nav-link ">
                                            <i class="icon-graph"></i>
                                            <span class="title">PRODUCTOS</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  start">
                                        <a href="{!! url('ventas') !!}" class="nav-link ">
                                            <i class="icon-graph"></i>
                                            <span class="title">VENTAS</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  start">
                                        <a href="{!! url('anular-venta') !!}" class="nav-link ">
                                            <i class="icon-graph"></i>
                                            <span class="title">ANULAR VENTAS</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  start">
                                        <a href="{!! url('reporte-ventas') !!}" class="nav-link ">
                                            <i class="icon-graph"></i>
                                            <span class="title">REPORTE VENTAS</span>
                                        </a>
                                    </li>
                                    @endif
                                    @if(Auth::user()->idroles == 2)
                                    <li class="nav-item  start">
                                        <a href="{!! url('ventas') !!}" class="nav-link ">
                                            <i class="icon-graph"></i>
                                            <span class="title">VENTAS</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  start">
                                        <a href="{!! url('anular-venta') !!}" class="nav-link ">
                                            <i class="icon-graph"></i>
                                            <span class="title">ANULAR VENTAS</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  start">
                                        <a href="{!! url('reporte-ventas') !!}" class="nav-link ">
                                            <i class="icon-graph"></i>
                                            <span class="title">REPORTE VENTAS</span>
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                            </li>
