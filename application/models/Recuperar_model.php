<?php
class Recuperar_model extends CI_Model {
  public $table = 'recuperar_senha';

  function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function insert(array $data){
    return $this->db->insert($this->table, $data);
  }

  public function token($token){
    $this->db->select('*');
    $this->db->from('recuperar_senha');
    $this->db->where('token', $token);
    $query = $this->db->get();
    return $query->result();
  }

}
