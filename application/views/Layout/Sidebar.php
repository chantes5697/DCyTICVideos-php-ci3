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
                <h6 class="collapse-header">Opciones:</h6>
                <a class="collapse-item" href="<?php echo base_url('Administrador/crearUsuario') ?>">Crear usuario</a>
                <a class="collapse-item" href="<?php echo base_url('Administrador/verUsuarios') ?>">Ver Usuarios</a>
            </div>
        </div>
    </li>
    <!-- Heading -->
    <div class="sidebar-heading">
        Videos
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Formatos</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Opciones:</h6>
                <a class="collapse-item" href="<?php echo base_url('Administrador/crearFormato') ?>">Crear Formato</a>
                <a class="collapse-item" href="<?php echo base_url('Administrador/verFormatos') ?>">Ver Formatos</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Cassettes</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Opciones:</h6>
                <a class="collapse-item" href="<?php echo base_url('Administrador/crearCassette') ?>">Crear Cassette</a>
                <a class="collapse-item" href="<?php echo base_url('Administrador/verCassettes') ?>">Ver Cassettes</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Videos</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Opciones:</h6>
                <a class="collapse-item" href="<?php echo base_url('Administrador/crearVideo') ?>">Crear Video</a>
                <a class="collapse-item" href="<?php echo base_url('Administrador/verVideos') ?>">Ver Videos</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Eventos</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Opciones:</h6>
                <a class="collapse-item" href="<?php echo base_url('Administrador/crearFiltro') ?>">Crear Evento</a>
                <a class="collapse-item" href="<?php echo base_url('Administrador/verFiltros') ?>">Ver Eventos</a>
            </div>
        </div>
    </li>

    
    <!-- Heading -->
    <div class="sidebar-heading">
        Cerrar Sesion
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Cerrar Sesion</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Opciones:</h6>
                <a class="collapse-item" href="<?php echo base_url('Administrador/cerrarSesion') ?>">Cerrar Sesion</a>
                
            </div>
        </div>
    </li>





</ul>
        <!-- End of Sidebar -->
        <!-- Bootstrap core JavaScript-->

        <script src=<?php echo base_url("public/vendor/jquery/jquery.min.js") ?>></script>
        <script src=<?php echo base_url("public/vendor/bootstrap/js/bootstrap.bundle.min.js") ?>></script>

        <!-- Core plugin JavaScript-->
        <script src=<?php echo base_url("public/vendor/jquery-easing/jquery.easing.min.js") ?>></script>

        <!-- Custom scripts for all pages-->
        <script src=<?php echo base_url("public/js/sb-admin-2.min.js") ?>></script>

        <!-- Page level plugins -->
        <script src=<?php echo base_url("public/vendor/datatables/jquery.dataTables.min.js") ?>></script>
        <script src=<?php echo base_url("public/vendor/datatables/dataTables.bootstrap4.min.js") ?>></script>

        <!-- Page level custom scripts -->
        <script src=<?php echo base_url("public/js/demo/datatables-demo.js") ?>></script>
