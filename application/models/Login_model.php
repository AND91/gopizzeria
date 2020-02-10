<?php

class Login_model extends CI_Model {
  public $table = 'acesso';

  public function __construct(){
    parent::__construct();
  }

  public function insert(array $data){
    return $this->db->insert($this->table, $data);
  }

  public function autentica_login($usuario){
    $this->db->select('*');
    $this->db->from('acesso');
    $this->db->where('usuario', $usuario);
    $query = $this->db->get();
    return $query->result();
  }

  public function autentica($email){
    $this->db->select('*');
    $this->db->from('acesso');
    $this->db->where('email', $email);
    $query = $this->db->get();
    return $query->result();
  }

}

 ?>
