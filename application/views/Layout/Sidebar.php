<!-- Sidebar - Brand -->
<ul class="navbar-nav bg-gradient-buap sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon ">
            <img src="<?php echo base_url("public/img/logo-buap.jpg")?>" alt="" height='50' width="auto">
        </div>

    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">



    <!-- Heading -->
    <div class="sidebar-heading">
        Usuarios
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Usuarios</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="<?php echo base_url('Administrador/crearUsuario') ?>">Crear usuario</a>
                <a class="collapse-item" href="<?php echo base_url('Administrador/verUsuarios') ?>">Ver Usuarios</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Formatos</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="<?php echo base_url('Administrador/crearFormato') ?>">Crear Formato</a>
                <a class="collapse-item" href="<?php echo base_url('Administrador/verFormatos') ?>">Ver Formatos</a>
            </div>
        </div>
    </li>





</ul>
        <!-- End of Sidebar -->
