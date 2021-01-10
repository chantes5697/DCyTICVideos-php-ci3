<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DCyTICVideos - Ver Usuarios</title>


    <!-- Custom fonts for this template -->
    <?php
      $this->load->view('Layout/Head');
    ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

       

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php //$this->load->view('Layout/Navbar') ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h1 mb-2 text-gray-800" style="text-align: center;">Reporte de Contenido de Eventos por Cassette</h1>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm">
                            <h4>Fecha: <?php echo date('d-m-Y');?></h4>
                            </div>
                            
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            
                            <div class="col-sm">
                            <h4>Cassette: <?php echo $datac[0]['clave'];?></h4>
                            </div>
                            <div class="col-sm">
                            <h4>Formato: <?php echo $datac[0]['formato'];?></h4>
                            </div>
                        </div>
                    </div>
                    
                    

                    <!-- DataTales Example -->

                        <div class="card shadow mb-4">

                        <div class="card-body">
                            <div class="table-responsive">
                                
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">Fecha</th>
                                            <th style="text-align: center;">Contenido</th>
                                            <th style="text-align: center;">Tiempo</th>
                                            
                                        </tr>
                                    </thead>

                                    <tbody>
                                      <?php if(isset($datae)): ?>
                                        <?php foreach ($datae as $key): ?>
                                          <tr>
                                          
                                              <td style="text-align: center;"><?php echo($key[0]['fecha']) ?></td>
                                              <td style="text-align: center;" ><?php echo $key[0]['contenido']; ?></td>
                                              <td style="text-align: center;" ><?php echo $key[0]['tiempo']; ?></td>
                                            
                                          </tr>
                                        <?php endforeach; ?>
                                      <?php endif; ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    

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
    

</body>

</html>
