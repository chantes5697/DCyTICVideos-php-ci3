<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Ingreso extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->model('IngresoModel');
            $this->load->helper('url_helper');
            $this->load->helper('form');
    }


    public function ingreso()
    {

        $estado = $this->input->post('submit');

        if(!(isset($estado))){
          $this->load->view("ingreso/Login");
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
    				)
    			);

    			$this->form_validation->set_rules($configf);

    			if($this->form_validation->run() == FALSE):

    				$error_datos = $this->form_validation->error_array();
         		$errorx = implode(' ',$error_datos);
    				$data = array(
    					'error' => $errorx

    				);

    				$this->load->view('ingreso/Login',$data);
          else:
            $data = array(
              'username' => $this->input->post('username') ,
              'password' => $this->input->post('password')
            );
            $query = $this->IngresoModel->get_num_usuarios($data['username']);
            if($query == 0){
              $errorx = "usuario incorrecto";
              $datax = array(
                'error' => $errorx

              );

              $this->load->view('ingreso/Login',$datax);
            }
            else{
              $query2 = $this->IngresoModel->login($data);


              $password = $query2[0]['password'];

              $this->load->library('bcrypt');

              $pass = $this->input->post('password');

              if ($this->bcrypt->check_password($pass, $password))
              {
                // Password does match stored password.
                ;
                $_SESSION['user'] = $query2[0]['username'];
                $_SESSION['tipo'] = $query2[0]['rol'];

                redirect('Administrador/verUsuarios', 'refresh');
              }
              else
              {
                $errorx = "Password incorrecta";
                $datax = array(
                  'error' => $errorx

                );

                $this->load->view('ingreso/Login',$datax);
                // Password does not match stored password.
              }
            }

          endif;

        }




    }
}

?>
