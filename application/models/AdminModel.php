<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class AdminModel extends CI_Model{

    public function getUsuarios(){
      $this->db->select('*');
      $this->db->from('usuario');
      $query = $this->db->get()->result_array();
      return $query;
    }

    public function crearUsuario($data){
      $this->db->insert('usuario',$data);
      return $this->db->insert_id();
    }

    public function deshabilitarUsuario($id){
      $data = array('estado' => 0  );
      $this->db->where('idusr', $id);
      $this->db->update('usuario', $data);



    }

    public function habilitarUsuario($id){
      $data = array('estado' => 1  );
      $this->db->where('idusr', $id);
      $this->db->update('usuario', $data);



    }

    public function getRoles(){
      $this->db->select('*');
      $this->db->from('rol');
      $query = $this->db->get()->result_array();
      return $query;
    }


    public function usuarioExiste($data){
      $this->db->select('count(*) as c');
      $this->db->from('usuario');
      $this->db->where('username',$data);
      $num = $this->db->get()->result_array();
      return $num;
    }

  }

?>
