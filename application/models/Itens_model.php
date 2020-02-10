<?php
class Itens_model extends CI_Model {
  public $table = 'itens_pedido';

  function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function insert(array $data){
    return $this->db->insert($this->table, $data);
  }
}
?>
