<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Administrador extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            if(!isset($_SESSION)){
              redirect(Ingreso/ingreso);
            }
            $this->load->model('AdminModel');
            $this->load->helper('url_helper');

            if($_SESSION['tipo'] != 1){
              redirect('Ingreso/ingreso', 'refresh');
            }
    }

    public function verUsuarios(){
      $datax = $this->AdminModel->getUsuarios();
      //var_dump($datax);
      $data = array(
        'data' => $datax
      );
      $this->load->view('Usuarios/verUsuarios', $data);
    }

    public function deleteUsuario($id){

      $this->AdminModel->deshabilitarUsuario($id);
      redirect('Administrador/verUsuarios', 'refresh');
    }

    public function habilitarUsuario($id){

      $this->AdminModel->habilitarUsuario($id);
      redirect('Administrador/verUsuarios', 'refresh');
    }

    public function crearUsuario(){
      $estado = $this->input->post('submit');
      $this->load->library('bcrypt');

      $query = $this->AdminModel->getRoles();
      $query2 = array(
        'roles' => $query
      );
      if(!(isset($estado))){
        $this->load->view("Usuarios/CrearUsuario",$query2);
      }
      else{
        $configf = array(
          array(
              'field' => 'username',
              'label' => 'Usuario',
              'rules' => 'required'
          ),
          array(
              'field' => 'password',
              'label' => 'Password',
              'rules' => 'required'
          ),
          array(
              'field' => 'rol',
              'label' => 'Rol',
              'rules' => 'required'
          )
        );

        $this->form_validation->set_rules($configf);

        if($this->form_validation->run() == FALSE):

          $error_datos = $this->form_validation->error_array();
          $errorx = implode(' ',$error_datos);
          $data = array(
            'username' => $this->input->post('username') ,
            'password' => $this->input->post('password'),
            'rol' => $this->input->post('rol'),
            'estado' => 1
          );
          $datax = array(
            'error' => $errorx,
            'roles' => $query,
            'data' => $data
          );

          $this->load->view('Usuarios/crearUsuario',$datax);
        else:
          $password = $this->input->post('password');
          $hash = $this->bcrypt->hash_password($password);

          $data = array(
            'username' => $this->input->post('username') ,
            'password' => $hash,
            'rol' => $this->input->post('rol'),
            'estado' => 1
          );

          $user = $this->input->post('username');

          $queryusr = $this->AdminModel->usuarioExiste($user);
          $numusr = $queryusr[0]['c'];
          //var_dump($queryusr);
          if( $numusr  == 0){
            $this->AdminModel->crearUsuario($data);
            redirect('Administrador/verUsuarios', 'refresh');
          }
          else{
            $errorx = 'Usuario ya existe';
            $data = array(
              'username' => $this->input->post('username') ,
              'password' => $this->input->post('password'),
              'rol' => $this->input->post('rol'),
              'estado' => 1
            );
            $datax = array(
              'error' => $errorx,
              'data' => $data,
              'roles' => $query
            );

            $this->load->view('Usuarios/crearUsuario',$datax);
          }




        endif;
      }

    }








}

?>
