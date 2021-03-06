<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DCyTICVideos - Crear Evento</title>


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

                              <?php if (isset($error)):?>
                                <div class="p-3 mb-2 bg-danger text-white">
                                  <?php
                                    echo($error);
                                  ?>

                                </div>
                              <?php endif; ?>

                              <?php if (isset($data)): ?>
                                <?php

                                  $attributes = array('class' => 'user', 'id' => 'myform');
                                  echo form_open('Administrador/editarFiltro/'.$id, $attributes);
                                ?>



                                    <div class="form-group">
                                      <?php
                                        $datax = array(
                                                'name'          => 'contenido',
                                                'id'            => 'contenido',
                                                'type' => 'text',
                                                'value' => $data['contenido'],
                                                'class' => 'form-control form-control-user',
                                                'placeholder' => 'contenido'
                                        );

                                        echo form_input($datax);
                                      ?>



                                    </div>

                                    <div class="form-group">
                                      <?php
                                        //var_dump($data['fecha']);
                                        $datax = array(
                                                'name'          => 'fecha',
                                                'id'            => 'fecha',
                                                'type' => 'date',
                                                'value' => $data['fecha'],
                                                'class' => 'form-control form-control-user',
                                                'placeholder' => 'Fecha'
                                        );

                                        echo form_input($datax);
                                      ?>



                                    </div>

                                    <div class="form-group">
                                      <?php
                                        $datax = array(
                                                'name'          => 'tiempo',
                                                'id'            => 'tiempo',
                                                'type' => 'tiempo',
                                                'value' => $data['tiempo'],
                                                'class' => 'form-control form-control-user',
                                                'placeholder' => 'Fecha'
                                        );

                                        echo form_input($datax);
                                      ?>



                                    </div>


                                    <div class="form-group">
                                      <select class="form-control user-select" name="contenido">
                                        <?php foreach ($videos as $rol ): ?>
                                          <option value="<?php echo($rol['idvideo']) ?>"><?php echo $rol['contenido'] ?></option>
                                        <?php endforeach; ?>
                                      </select>


                                    </div>

                                    <input type="submit" name= 'submit' value="Crear Evento" class="btn btn-primary btn-user btn-block bg-buap">



                                <?php
                                  echo form_close();
                                ?>
                              <?php else: ?>
                                <?php

                                  $attributes = array('class' => 'user', 'id' => 'myform');
                                  echo form_open('Administrador/crearFiltro', $attributes);
                                ?>



                                    <div class="form-group">
                                      <?php
                                        $datax = array(
                                                'name'          => 'contenido',
                                                'id'            => 'contenido',
                                                'type' => 'text',
                                                'class' => 'form-control form-control-user',
                                                'placeholder' => 'Contenido'
                                        );

                                        echo form_input($datax);
                                      ?>



                                    </div>

                                    <div class='form-group'>
                                        <?php echo form_label('Fecha', 'fecha');?>
                                    </div>


                                    <div class="form-group">
                                      <?php
                                        $datax = array(
                                                'name'          => 'fecha',
                                                'id'            => 'fecha',
                                                'type' => 'date',
                                                'class' => 'form-control form-control-user',
                                                'placeholder' => 'Fecha'
                                        );

                                        echo form_input($datax);
                                      ?>



                                    </div>

                                    <div class='form-group'>
                                        <?php echo form_label('Tiempo', 'tiempo');?>
                                    </div>


                                    <div class="form-group">
                                      <?php
                                        $datax = array(
                                                'name'          => 'tiempo',
                                                'id'            => 'tiempo',
                                                'type' => 'time',
                                                'class' => 'form-control form-control-user',
                                                'step' => '2',
                                                'placeholder' => 'Tiempo'
                                        );

                                        echo form_input($datax);
                                      ?>



                                    </div>

                                    <div class="form-group">
                                    
                                      <select class="form-control user-select" name="video">
                                     
                                        <?php foreach ($videos as $rol ): ?>
                                          <option value="<?php echo($rol['idvideo']) ?>"><?php echo $rol['contenido'] ?></option>
                                        <?php endforeach; ?>
                                      </select>


                                    </div>

                                    <input type="submit" name= 'submit' value="Crear Evento" class="btn btn-primary btn-user btn-block bg-buap">



                                <?php
                                  echo form_close();
                                ?>
                              <?php endif; ?>


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
            <?php //$this->load->view('Layout/footer') ?>
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
