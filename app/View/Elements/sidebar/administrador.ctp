
<!-- START Template Sidebar (Left) -->
<aside class="sidebar sidebar-left sidebar-menu">
    <!-- START Sidebar Content -->
    <section class="content slimscroll">
        <h5 class="heading">Main Menu</h5>
        <!-- START Template Navigation/Menu -->
        <ul class="topmenu topmenu-responsive" data-toggle="menu" style="min-height: 500px;">
            <li>
                <a href="javascript:void(0);" data-target="#side-usuarios" data-toggle="submenu" data-parent=".topmenu">
                    <span class="figure"><i class="ico-users3"></i></span>
                    <span class="text">Usuarios</span>
                    <span class="arrow"></span>
                </a>
                <!-- START 2nd Level Menu -->
                <ul id="side-usuarios" class="submenu collapse ">
                    <li class="submenu-header ellipsis">Usuarios</li>
                    <li>
                        <a href="<?php echo $this->Html->url(array('controller' => 'Users', 'action' => 'index')); ?>">
                            <span class="text">Listado de Usuarios</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Users', 'action' => 'usuario')); ?>');">
                            <span class="text">Nuevo Usuario</span>
                        </a>
                    </li>
                </ul>
                <!--/ END 2nd Level Menu -->
            </li>
            <li>
                <a href="javascript:void(0);" data-target="#side-roles" data-toggle="submenu" data-parent=".topmenu">
                    <span class="figure"><i class="ico-group"></i></span>
                    <span class="text">Roles</span>
                    <span class="arrow"></span>
                </a>
                <!-- START 2nd Level Menu -->
                <ul id="side-roles" class="submenu collapse ">
                    <li class="submenu-header ellipsis">Roles</li>
                    <li>
                        <a href="<?php echo $this->Html->url(array('controller' => 'Roles', 'action' => 'index')); ?>">
                            <span class="text">Listado de Roles</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Roles', 'action' => 'role')); ?>');">
                            <span class="text">Nuevo Role</span>
                        </a>
                    </li>
                </ul>
                <!--/ END 2nd Level Menu -->
            </li>
            <li>
                <a href="javascript:void(0);" data-target="#side-rutas" data-toggle="submenu" data-parent=".topmenu">
                    <span class="figure"><i class="ico-exchange"></i></span>
                    <span class="text">Rutas</span>
                    <span class="arrow"></span>
                </a>
                <!-- START 2nd Level Menu -->
                <ul id="side-rutas" class="submenu collapse ">
                    <li class="submenu-header ellipsis">Rutas</li>
                    <li>
                        <a href="<?php echo $this->Html->url(array('controller' => 'Rutas', 'action' => 'index')); ?>">
                            <span class="text">Listado de Rutas</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Rutas', 'action' => 'ruta')); ?>');">
                            <span class="text">Nueva Ruta</span>
                        </a>
                    </li>
                </ul>
                <!--/ END 2nd Level Menu -->
            </li>
            <li>
                <a href="javascript:void(0);" data-target="#side-clientes" data-toggle="submenu" data-parent=".topmenu">
                    <span class="figure"><i class="ico-users4"></i></span>
                    <span class="text">Clientes</span>
                    <span class="arrow"></span>
                </a>
                <!-- START 2nd Level Menu -->
                <ul id="side-clientes" class="submenu collapse ">
                    <li class="submenu-header ellipsis">Clientes</li>
                    <li>
                        <a href="<?php echo $this->Html->url(array('controller' => 'Clientes', 'action' => 'index')); ?>">
                            <span class="text">Listado de Clientes</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Clientes', 'action' => 'cliente')); ?>');">
                            <span class="text">Nuevo Cliente</span>
                        </a>
                    </li>
                </ul>
                <!--/ END 2nd Level Menu -->
            </li>
            <li>
                <a href="javascript:void(0);" data-target="#side-marcas" data-toggle="submenu" data-parent=".topmenu">
                    <span class="figure"><i class="ico-bag"></i></span>
                    <span class="text">Marcas</span>
                    <span class="arrow"></span>
                </a>
                
                <!-- START 2nd Level Menu -->
                <ul id="side-marcas" class="submenu collapse ">
                    <li class="submenu-header ellipsis">Marcas</li>
                    <li >
                        <a href="<?php echo $this->Html->url(array('controller' => 'Marcas', 'action' => 'index')); ?>">
                            <span class="text">Listado de Marcas</span>
                        </a>
                    </li>
                    <li >
                        <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Marcas', 'action' => 'marca')); ?>');">
                            <span class="text">Nueva Marca</span>
                        </a>
                    </li>
                </ul>
                <!--/ END 2nd Level Menu -->
            </li>
            <li>
                <a href="javascript:void(0);" data-target="#side-categorias" data-toggle="submenu" data-parent=".topmenu">
                    <span class="figure"><i class="ico-stack3"></i></span>
                    <span class="text">Categorias</span>
                    <span class="arrow"></span>
                </a>
                
                <!-- START 2nd Level Menu -->
                <ul id="side-categorias" class="submenu collapse ">
                    <li class="submenu-header ellipsis">Categorias</li>
                    <li >
                        <a href="<?php echo $this->Html->url(array('controller' => 'Categorias', 'action' => 'index')); ?>">
                            <span class="text">Listado de Categorias</span>
                        </a>
                    </li>
                    <li >
                        <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Categorias', 'action' => 'categoria')); ?>');">
                            <span class="text">Nueva Categoria</span>
                        </a>
                    </li>
                </ul>
                <!--/ END 2nd Level Menu -->
            </li>
            <li>
                <a href="javascript:void(0);" data-target="#side-materiales" data-toggle="submenu" data-parent=".topmenu">
                    <span class="figure"><i class="ico-package"></i></span>
                    <span class="text">Materiales</span>
                    <span class="arrow"></span>
                </a>
                
                <!-- START 2nd Level Menu -->
                <ul id="side-materiales" class="submenu collapse ">
                    <li class="submenu-header ellipsis">Materiales</li>
                    <li >
                        <a href="<?php echo $this->Html->url(array('controller' => 'Materiales', 'action' => 'index')); ?>">
                            <span class="text">Listado de Materiales</span>
                        </a>
                    </li>
                    <li >
                        <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Materiales', 'action' => 'material')); ?>');">
                            <span class="text">Nueva Material</span>
                        </a>
                    </li>
                </ul>
                <!--/ END 2nd Level Menu -->
            </li>
            <li>
                <a href="javascript:void(0);" data-target="#side-ciclos" data-toggle="submenu" data-parent=".topmenu">
                    <span class="figure"><i class="ico-spinner3"></i></span>
                    <span class="text">Ciclos</span>
                    <span class="arrow"></span>
                </a>
                
                <!-- START 2nd Level Menu -->
                <ul id="side-ciclos" class="submenu collapse ">
                    <li class="submenu-header ellipsis">Ciclos</li>
                    <li >
                        <a href="<?php echo $this->Html->url(array('controller' => 'Ciclos', 'action' => 'index')); ?>">
                            <span class="text">Listado de Ciclos</span>
                        </a>
                    </li>
                    <li >
                        <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Ciclos', 'action' => 'ciclo')); ?>');">
                            <span class="text">Nuevo Ciclo</span>
                        </a>
                    </li>
                </ul>
                <!--/ END 2nd Level Menu -->
            </li>
        </ul>
        <!--/ END Template Navigation/Menu -->
    </section>
    <!--/ END Sidebar Container -->
</aside>
<!--/ END Template Sidebar (Left) -->