<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DCyTICVideos - Ver Eventos</title>


    <!-- Custom fonts for this template -->
    <?php
      $this->load->view('Layout/Head');
    ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
         $this->load->view('Layout/Sidebar')
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php $this->load->view('Layout/Navbar') ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Eventos</h1>


                    <!-- DataTales Example -->

                        <div class="card shadow mb-4">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">Contenido</th>
                                            <th style="text-align: center;">Video</th>
                                            <th style="text-align: center;">Fecha</th>
                                            <th style="text-align: center;">Tiempo</th>
                                            <th style="text-align: center;">Editar</th>
                                            <th style="text-align: center;">Estado</th>
                                            <th style="text-align: center;">Habilitar/Deshabilitar</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                      <?php if(isset($data)): ?>
                                        <?php foreach ($data as $key): ?>
                                          <tr>
                                              <td style="text-align: center;"><?php echo($key['contenido']) ?></td>
                                              <td style="text-align: center;" ><?php echo $key['video']; ?></td>
                                              <td style="text-align: center;" ><?php echo $key['fecha']; ?></td>
                                              <td style="text-align: center;" ><?php echo $key['tiempo']; ?></td>
                                              <td style="text-align: center;"><a  href = "<?php echo base_url('Administrador/editarFiltro/'.$key['idfiltro']); ?>" ><i class="fas fa-edit"></i></a></td>
                                              <?php if ($key['estado'] == 1): ?>
                                                <td style="text-align: center;">Habilitado</td>
                                                <td style="text-align: center;"><a  href = "<?php echo base_url('Administrador/deleteFiltro/'.$key['idfiltro']); ?>" ><i class="fa fa-times"></i></a></td>
                                              <?php else: ?>
                                               <td style="text-align: center;">Deshabilitado</td>
                                               <td style="text-align: center;"><a  href = "<?php echo base_url('Administrador/habilitarFiltro/'.$key['idfiltro']); ?>" ><i class="fa fa-check"></i></a></td>
                                              <?php endif; ?>
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

            <!-- Footer -->
            <?php $this->load->view('Layout/footer') ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

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

</body>

</html>
