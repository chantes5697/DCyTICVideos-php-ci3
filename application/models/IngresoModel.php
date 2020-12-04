<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class IngresoModel extends CI_Model{

    public function get_num_usuarios($data){
            $this->db->select('count(*) as c');
            $this->db->from('usuario');

            $array = array(
              'username' => $data,
              'estado' => 1
            ) ;
            $this->db->where($array);
            return $this->db->get()->result_array();
      }

    public function login($data){
      $this->db->select('*');
      $this->db->from('usuario');
      $this->db->where('username', $data['username']);
      $estado = 1;
      $this->db->where('estado', $estado);
      return $this->db->get()->result_array();

    }


  }

?>
