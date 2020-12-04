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
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //Usuarios
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
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
        $this->load->view("Usuarios/crearUsuario",$query2);
      }
      else{
        $configf = array(
          array(
              'field' => 'username',
              'label' => 'Usuario',
              'rules' => 'required|strip_tags'
          ),
          array(
              'field' => 'password',
              'label' => 'Password',
              'rules' => 'required|strip_tags'
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

    public function editarUsuario($id){
      $estado = $this->input->post('submit');
      $this->load->library('bcrypt');
      $dta = $this->AdminModel-> getUsuario($id);
      $query = $this->AdminModel->getRoles();
      $query2 = array(
        'data' => $dta[0],
        'id' => $id,
        'roles' => $query
      );
      if(!(isset($estado))){
        $this->load->view("Usuarios/editarUsuario",$query2);
      }
      else{
        $configf = array(
          array(
              'field' => 'username',
              'label' => 'Usuario',
              'rules' => 'required|strip_tags'
          ),
          array(
              'field' => 'password',
              'label' => 'Password',
              'rules' => 'required|strip_tags'
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
            'estado' => 1,
            'id' => $id
          );
          $datax = array(
            'error' => $errorx,
            'roles' => $query,
            'data' => $data
          );

          $this->load->view('Usuarios/editarUsuario',$datax);
        else:
          $password = $this->input->post('password');
          $hash = $this->bcrypt->hash_password($password);

          $data = array(
            'username' => $this->input->post('username') ,
            'password' => $hash,
            'rol' => $this->input->post('rol')
          );

          $user = $this->input->post('username');


          //var_dump($queryusr);

            $this->AdminModel->editarUsuario($id,$data);
            redirect('Administrador/verUsuarios', 'refresh');






        endif;
      }

    }
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //Fin usuarios
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //Formatos
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------

    public function verFormatos(){
      $datax = $this->AdminModel->getFormatos();
      //var_dump($datax);
      $data = array(
        'data' => $datax
      );
      $this->load->view('Formato/verFormatos', $data);
    }

    public function deleteFormato($id){

      $this->AdminModel->deshabilitarFormato($id);
      redirect('Administrador/verFormatos', 'refresh');
    }

    public function habilitarFormato($id){

      $this->AdminModel->habilitarFormato($id);
      redirect('Administrador/verFormatos', 'refresh');
    }

    public function crearFormato(){
      $estado = $this->input->post('submit');
      $this->load->library('bcrypt');

      $query = $this->AdminModel->getRoles();
      $query2 = array(
        'roles' => $query
      );
      if(!(isset($estado))){
        $this->load->view("Formato/crearFormato",$query2);
      }
      else{
        $configf = array(
          array(
              'field' => 'formato',
              'label' => 'Formato',
              'rules' => 'required|strip_tags'
          )
        );

        $this->form_validation->set_rules($configf);

        if($this->form_validation->run() == FALSE):

          $error_datos = $this->form_validation->error_array();
          $errorx = implode(' ',$error_datos);
          $data = array(
            'formato' => $this->input->post('formato') ,

            'estado' => 1
          );
          $datax = array(
            'error' => $errorx,

            'data' => $data
          );

          $this->load->view('Formato/crearFormato',$datax);
        else:
          $password = $this->input->post('password');
          $hash = $this->bcrypt->hash_password($password);

          $data = array(
            'formato' => $this->input->post('formato') ,

            'estado' => 1
          );

          $user = $this->input->post('username');

          $queryusr = $this->AdminModel->usuarioExiste($user);
          $numusr = $queryusr[0]['c'];
          //var_dump($queryusr);
          if( $numusr  == 0){
            $this->AdminModel->crearUsuario($data);
            redirect('Administrador/verFormatos', 'refresh');
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

    public function editarFormato($id){
      $estado = $this->input->post('submit');
      $this->load->library('bcrypt');
      $dta = $this->AdminModel-> getUsuario($id);
      $query = $this->AdminModel->getRoles();
      $query2 = array(
        'data' => $dta[0],
        'id' => $id,
        'roles' => $query
      );
      if(!(isset($estado))){
        $this->load->view("Usuarios/editarUsuario",$query2);
      }
      else{
        $configf = array(
          array(
              'field' => 'username',
              'label' => 'Usuario',
              'rules' => 'required|strip_tags'
          ),
          array(
              'field' => 'password',
              'label' => 'Password',
              'rules' => 'required|strip_tags'
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
            'estado' => 1,
            'id' => $id
          );
          $datax = array(
            'error' => $errorx,
            'roles' => $query,
            'data' => $data
          );

          $this->load->view('Usuarios/editarUsuario',$datax);
        else:
          $password = $this->input->post('password');
          $hash = $this->bcrypt->hash_password($password);

          $data = array(
            'username' => $this->input->post('username') ,
            'password' => $hash,
            'rol' => $this->input->post('rol')
          );

          $user = $this->input->post('username');


          //var_dump($queryusr);

            $this->AdminModel->editarUsuario($id,$data);
            redirect('Administrador/verUsuarios', 'refresh');






        endif;
      }

    }








}

?>
