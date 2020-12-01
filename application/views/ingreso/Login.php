<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>

<html lang="es">
<head>
  <?php $this->load->view("Layout/Head"); ?>
  <title="SGV - Login">
</head>


<body class="bg-gradient-buap">

    <div class="container content-login">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block ">
                                <img src=<?php echo base_url("public/img/buap-logo-grande.png")?> class="buap-login-logo">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Sistema de Gestion de Videos</h1>
                                    </div>

                                    <?php
                                      $attributes = array('class' => 'user', 'id' => 'myform');
                                      echo form_open('Ingreso/ingreso', $attributes);
                                    ?>

                                    <?php if (isset($error)):?>
                                      <div class="p-3 mb-2 bg-danger text-white">
                                        <?php
                                          echo($error);
                                        ?>
                                      </div>
                                    <?php endif; ?>

                                        <div class="form-group">
                                          <?php
                                            $data = array(
                                                    'name'          => 'username',
                                                    'id'            => 'username',
                                                    'type' => 'text',
                                                    'class' => 'form-control form-control-user',
                                                    'placeholder' => 'Usuario'
                                            );

                                            echo form_input($data);
                                          ?>



                                        </div>
                                        <div class="form-group">
                                          <?php
                                            $data = array(
                                                    'name'          => 'password',
                                                    'id'            => 'password',
                                                    'type' => 'password',
                                                    'class' => 'form-control form-control-user',
                                                    'placeholder' => 'Password'
                                            );

                                            echo form_input($data);
                                          ?>

                                        </div>

                                        <input type="submit" name= 'submit' value="Log in" class="btn btn-primary btn-user btn-block bg-buap">



                                    <?php
                                      echo form_close();
                                    ?>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>




    <!-- Bootstrap core JavaScript-->
    <script src= <?php echo base_url("public/public/public/public/vendor/jquery/jquery.min.js") ?> ></script>
    <script src= <?php echo base_url("public/public/public/vendor/bootstrap/js/bootstrap.bundle.min.js") ?> ></script>

    <!-- Core plugin JavaScript-->
    <script src= <?php echo base_url("public/public/vendor/jquery-easing/jquery.easing.min.js") ?> ></script>

    <!-- Custom scripts for all pages-->
    <script src=<?php echo base_url("public/js/sb-admin-2.min.js") ?>></script>

</body>

</html>
