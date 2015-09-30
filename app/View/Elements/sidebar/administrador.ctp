
<!-- START Template Sidebar (Left) -->
<aside class="sidebar sidebar-left sidebar-menu">
    <!-- START Sidebar Content -->
    <section class="content slimscroll">
        <h5 class="heading">Main Menu</h5>
        <!-- START Template Navigation/Menu -->
        <ul class="topmenu topmenu-responsive" data-toggle="menu">
            <li>
                <a href="javascript:void(0);" data-target="#side-usuarios" data-toggle="submenu" data-parent=".topmenu">
                    <span class="figure"><i class="ico-users3"></i></span>
                    <span class="text">Usuarios</span>
                    <span class="arrow"></span>
                </a>
                <!-- START 2nd Level Menu -->
                <ul id="side-usuarios" class="submenu collapse ">
                    <li class="submenu-header ellipsis">Usuarios</li>
                    <li >
                        <a href="<?php echo $this->Html->url(array('controller' => 'Users', 'action' => 'index')); ?>">
                            <span class="text">Listado de Usuarios</span>
                        </a>
                    </li>
                    <li >
                        <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Users', 'action' => 'usuario')); ?>');">
                            <span class="text">Nuevo Usuario</span>
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