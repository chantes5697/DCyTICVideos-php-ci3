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
      if($datax){

				foreach ($datax as &$k) {
					// code...
					$dataq =$this->AdminModel->get_rol_by_id($k['rol']) ;
					$k['rol']= $dataq[0]['nombre'];

				}
			}
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


          $data = array(
            'formato' => $this->input->post('formato') ,

            'estado' => 1
          );

          $datam = array(
            'nombre' => $this->input->post('formato') ,

            'estado' => 1
          );

          $user = $this->input->post('formato');

          $queryusr = $this->AdminModel->formatoExiste($user);
          $numusr = $queryusr[0]['c'];
          //var_dump($queryusr);
          if( $numusr  == 0){
            $this->AdminModel->crearFormato($datam);
            redirect('Administrador/verFormatos', 'refresh');
          }
          else{
            $errorx = 'Formato ya existe';
            $data = array(
              'formato' => $this->input->post('formato') ,

              'estado' => 1
            );
            $datax = array(
              'error' => $errorx,

              'data' => $data
            );

            $this->load->view('Formato/crearFormato',$datax);

            $this->load->view('Usuarios/crearUsuario',$datax);
          }




        endif;
      }

    }
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //Fin Formatos


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
    //Cassettes
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    public function verCassettes(){
      $datax = $this->AdminModel->getCassettes();
      if($datax){

				foreach ($datax as &$k) {
					// code...
					$dataq =$this->AdminModel->get_formato_by_id($k['formato']) ;
					$k['formato']= $dataq[0]['nombre'];

				}
			}
      //var_dump($datax);
      $data = array(
        'data' => $datax
      );
      $this->load->view('Cassette/verCassettes', $data);
    }

    public function deleteCassette($id){

      $this->AdminModel->deshabilitarUsuario($id);
      redirect('Administrador/verCassettes', 'refresh');
    }

    public function habilitarCassette($id){

      $this->AdminModel->habilitarCassette($id);
      redirect('Administrador/verCassettes', 'refresh');
    }

    public function crearCassette(){
      $estado = $this->input->post('submit');


      $query = $this->AdminModel->getFormatos();
      $query2 = array(
        'formatos' => $query
      );
      if(!(isset($estado))){
        $this->load->view("Cassette/crearCassette",$query2);
      }
      else{
        $configf = array(
          array(
              'field' => 'clave',
              'label' => 'Clave',
              'rules' => 'required|strip_tags'
          ),

          array(
              'field' => 'formato',
              'label' => 'Formato',
              'rules' => 'required'
          )


        );

        $this->form_validation->set_rules($configf);

        if($this->form_validation->run() == FALSE):

          $error_datos = $this->form_validation->error_array();
          $errorx = implode(' ',$error_datos);
          $data = array(
            'clave' => $this->input->post('clave') ,
            'formato' => $this->input->post('formato'),
            'estado' => 1
          );
          $datax = array(
            'error' => $errorx,
            'formatos' => $query,
            'data' => $data
          );

          $this->load->view("Cassette/crearCassette",$datax);
        else:

          $data = array(
            'clave' => $this->input->post('clave') ,
            'formato' => $this->input->post('formato'),
            'estado' => 1
          );

          $user = $this->input->post('clave');

          $queryusr = $this->AdminModel->cassetteExiste($user);
          $numusr = $queryusr[0]['c'];
          //var_dump($queryusr);
          if( $numusr  == 0){
            $this->AdminModel->crearCassette($data);
            redirect('Administrador/verCassettes', 'refresh');
          }
          else{
            $errorx = 'Cassette ya existe';
            $data = array(
              'clave' => $this->input->post('clave') ,
              'formato' => $this->input->post('formato'),
              'estado' => 1
            );
            $datax = array(
              'error' => $errorx,
              'data' => $data,
              'formatos' => $query
            );

            $this->load->view("Cassette/crearCassette",$datax);
          }




        endif;
      }

    }

    public function editarCassette($id){
      $estado = $this->input->post('submit');

      $dta = $this->AdminModel-> getCassette($id);
      $query = $this->AdminModel->getFormatos();
      $query2 = array(
        'data' => $dta[0],
        'id' => $id,
        'formatos' => $query
      );
      if(!(isset($estado))){
        $this->load->view("Cassette/editarCassette",$query2);
      }
      else{
        $configf = array(
          array(
              'field' => 'clave',
              'label' => 'Clave',
              'rules' => 'required|strip_tags'
          ),

          array(
              'field' => 'formato',
              'label' => 'Formato',
              'rules' => 'required'
          )
        );

        $this->form_validation->set_rules($configf);

        if($this->form_validation->run() == FALSE):

          $error_datos = $this->form_validation->error_array();
          $errorx = implode(' ',$error_datos);
          $data = array(
            'clave' => $this->input->post('clave') ,
            'formato' => $this->input->post('formato'),
            'estado' => 1

          );
          $datax = array(
            'error' => $errorx,
            'formatos' => $query,
            'data' => $data,
            'id' => $id
          );

          $this->load->view('Cassette/editarCassette',$datax);
        else:


          $data = array(
            'clave' => $this->input->post('clave') ,
            'formato' => $this->input->post('formato'),
            'estado' => 1
          );


          //$user = $this->input->post('username');


          //var_dump($queryusr);

            $this->AdminModel->editarCassette($id,$data);
            redirect('Administrador/verCassettes', 'refresh');






        endif;
      }

    }


    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //Fin Cassettes


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
    //Videos
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    public function verVideos(){
      $datax = $this->AdminModel->getVideos();
      if($datax){

        foreach ($datax as &$k) {
          // code...
          $dataq =$this->AdminModel->get_cassette_by_id($k['cassette']) ;
          $k['cassette']= $dataq[0]['clave'];

        }
      }
      //var_dump($datax);
      $data = array(
        'data' => $datax
      );
      $this->load->view('Videos/verVideos', $data);
    }

    public function deleteVideo($id){

      $this->AdminModel->deshabilitarVideo($id);
      redirect('Administrador/verVideos', 'refresh');
    }

    public function habilitarVideo($id){

      $this->AdminModel->habilitarVideo($id);
      redirect('Administrador/verVideos', 'refresh');
    }

    public function crearVideo(){
      $estado = $this->input->post('submit');


      $query = $this->AdminModel->getCassettes();
      $query2 = array(
        'cassettes' => $query
      );
      if(!(isset($estado))){
        $this->load->view("Videos/crearVideo",$query2);
      }
      else{
        $configf = array(
          array(
              'field' => 'contenido',
              'label' => 'Contenido',
              'rules' => 'required|strip_tags'
          ),
          array(
              'field' => 'fecha',
              'label' => 'Fecha',
              'rules' => 'required'
          ),
          array(
              'field' => 'duracion',
              'label' => 'Duracion',
              'rules' => 'required'
          ),
          array(
              'field' => 'cassette',
              'label' => 'Cassette',
              'rules' => 'required'
          )


        );

        $this->form_validation->set_rules($configf);

        if($this->form_validation->run() == FALSE):

          $error_datos = $this->form_validation->error_array();
          $errorx = implode(' ',$error_datos);
          $data = array(
            'contenido' => $this->input->post('contenido') ,
            'cassette' => $this->input->post('cassette'),
            'fecha' => $this->input->post('fecha'),
            'duracion' => $this->input->post('duracion'),
            'estado' => 1
          );
          $datax = array(
            'error' => $errorx,
            'cassettes' => $query,
            'data' => $data
          );

          $this->load->view("Videos/crearVideo",$datax);
        else:

          $data = array(
            'contenido' => $this->input->post('contenido') ,
            'cassette' => $this->input->post('cassette'),
            'fecha' => $this->input->post('fecha'),
            'duracion' => $this->input->post('duracion'),
            'estado' => 1
          );

          $user = $this->input->post('clave');

          $queryusr = $this->AdminModel->VideoExiste($user);
          $numusr = $queryusr[0]['c'];
          //var_dump($queryusr);
          if( $numusr  == 0){
            $this->AdminModel->crearVideo($data);
            redirect('Administrador/verVideos', 'refresh');
          }
          else{
            $errorx = 'Video ya existe';
            $data = array(
              'contenido' => $this->input->post('contenido') ,
              'cassette' => $this->input->post('cassette'),
              'fecha' => $this->input->post('fecha'),
              'duracion' => $this->input->post('duracion'),
              'estado' => 1
            );
            $datax = array(
              'error' => $errorx,
              'data' => $data,
              'cassettes' => $query
            );

            $this->load->view("Videos/crearVideo",$datax);
          }




        endif;
      }

    }

    public function editarVideo($id){
      $estado = $this->input->post('submit');

      $dta = $this->AdminModel-> getVideo($id);
      $query = $this->AdminModel->getCassettes();
      $query2 = array(
        'data' => $dta[0],
        'id' => $id,
        'cassettes' => $query
      );
      if(!(isset($estado))){
        $this->load->view("Videos/editarVideo",$query2);
      }
      else{
        $configf = array(
          array(
              'field' => 'contenido',
              'label' => 'Contenido',
              'rules' => 'required|strip_tags'
          ),
          array(
              'field' => 'fecha',
              'label' => 'Fecha',
              'rules' => 'required'
          ),
          array(
              'field' => 'duracion',
              'label' => 'Duracion',
              'rules' => 'required'
          ),
          array(
              'field' => 'cassette',
              'label' => 'Cassette',
              'rules' => 'required'
          )
        );

        $this->form_validation->set_rules($configf);

        if($this->form_validation->run() == FALSE):

          $error_datos = $this->form_validation->error_array();
          $errorx = implode(' ',$error_datos);
          $data = array(
            'contenido' => $this->input->post('contenido') ,
            'cassette' => $this->input->post('cassette'),
            'fecha' => $this->input->post('fecha'),
            'duracion' => $this->input->post('duracion'),
            'estado' => 1
          );
          $datax = array(
            'error' => $errorx,
            'cassettes' => $query,
            'data' => $data
          );

          $this->load->view('Videos/editarVideo',$datax);
        else:


          $data = array(
            'contenido' => $this->input->post('contenido') ,
            'cassette' => $this->input->post('cassette'),
            'fecha' => $this->input->post('fecha'),
            'duracion' => $this->input->post('duracion'),
            'estado' => 1
          );


          //$user = $this->input->post('username');


          //var_dump($queryusr);

            $this->AdminModel->editarVideo($id,$data);
            redirect('Administrador/verVideos', 'refresh');






        endif;
      }

    }


    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //Fin Videos

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
    //Filtros
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    public function verFiltros(){
      $datax = $this->AdminModel->getFiltros();
      if($datax){

        foreach ($datax as &$k) {
          // code...
          $dataq =$this->AdminModel->get_video_by_id($k['video']) ;
          $k['video']= $dataq[0]['contenido'];

        }
      }
      //var_dump($datax);
      $data = array(
        'data' => $datax
      );
      $this->load->view('Filtro/verFiltros', $data);
    }

    public function deleteFiltro($id){

      $this->AdminModel->deshabilitarFiltro($id);
      redirect('Administrador/verFiltros', 'refresh');
    }

    public function habilitarFiltro($id){

      $this->AdminModel->habilitarFiltro($id);
      redirect('Administrador/verFiltros', 'refresh');
    }

    public function crearFiltro(){
      $estado = $this->input->post('submit');


      $query = $this->AdminModel->getVideos();
      $query2 = array(
        'videos' => $query
      );
      if(!(isset($estado))){
        $this->load->view("Filtro/crearFiltro",$query2);
      }
      else{
        $configf = array(
          array(
              'field' => 'contenido',
              'label' => 'contenido',
              'rules' => 'required|strip_tags'
          ),
          array(
              'field' => 'fecha',
              'label' => 'Fecha',
              'rules' => 'required|strip_tags'
          ),
          array(
              'field' => 'tiempo',
              'label' => 'Tiempo',
              'rules' => 'required|strip_tags'
          ),

          array(
              'field' => 'video',
              'label' => 'video',
              'rules' => 'required'
          )


        );

        $this->form_validation->set_rules($configf);

        if($this->form_validation->run() == FALSE):

          $error_datos = $this->form_validation->error_array();
          $errorx = implode(' ',$error_datos);
          $data = array(
            'contenido' => $this->input->post('contenido') ,
            'fecha' => $this->input->post('fecha'),
            'tiempo' => $this->input->post('tiempo'),
            'video' => $this->input->post('video'),
            'estado' => 1
          );
          $datax = array(
            'error' => $errorx,
            'videos' => $query,
            'data' => $data
          );

          $this->load->view("Filtro/crearFiltro",$datax);
        else:

          $data = array(
            'contenido' => $this->input->post('contenido') ,
            'fecha' => $this->input->post('fecha'),
            'tiempo' => $this->input->post('tiempo'),
            'video' => $this->input->post('video'),
            'estado' => 1
          );

          $user = $this->input->post('contenido');


          $numusr = $queryusr[0]['c'];
          //var_dump($queryusr);
          if( $numusr  == 0){
            $this->AdminModel->crearFiltro($data);
            redirect('Administrador/verFiltros', 'refresh');
          }
          else{
            $errorx = 'Filtro ya existe';
            $data = array(
              'contenido' => $this->input->post('contenido') ,
              'fecha' => $this->input->post('fecha'),
              'tiempo' => $this->input->post('tiempo'),
              'video' => $this->input->post('video'),
              'estado' => 1
            );
            $datax = array(
              'error' => $errorx,
              'data' => $data,
              'videos' => $query
            );

            $this->load->view("Filtro/crearFiltro",$datax);
          }




        endif;
      }

    }

    public function editarFiltro($id){
      $estado = $this->input->post('submit');

      $dta = $this->AdminModel-> getFiltro($id);
      $query = $this->AdminModel->getVideos();
      $query2 = array(
        'data' => $dta[0],
        'id' => $id,
        'videos' => $query
      );
      if(!(isset($estado))){
        $this->load->view("Filtro/editarFiltro",$query2);
      }
      else{
        $configf = array(
          array(
              'field' => 'contenido',
              'label' => 'contenido',
              'rules' => 'required|strip_tags'
          ),

          array(
              'field' => 'video',
              'label' => 'video',
              'rules' => 'required'
          )
        );

        $this->form_validation->set_rules($configf);

        if($this->form_validation->run() == FALSE):

          $error_datos = $this->form_validation->error_array();
          $errorx = implode(' ',$error_datos);
          $data = array(
            'contenido' => $this->input->post('contenido') ,
            'video' => $this->input->post('video'),
            'estado' => 1
          );
          $datax = array(
            'error' => $errorx,
            'videos' => $query,
            'data' => $data
          );

          $this->load->view('Filtro/editarFiltro',$datax);
        else:


          $data = array(
            'contenido' => $this->input->post('contenido') ,
            'fecha' => $this->input->post('fecha'),
            'tiempo' => $this->input->post('tiempo'),
            'video' => $this->input->post('video'),
            'estado' => 1
          );
          $datax = array(
            'error' => $errorx,
            'videos' => $query,
            'data' => $data
          );

          //$user = $this->input->post('username');


          //var_dump($queryusr);

            $this->AdminModel->editarFiltro($id,$data);
            redirect('Administrador/verFiltros', 'refresh');






        endif;
      }

    }


    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    //Fin Filtros












}

?>
