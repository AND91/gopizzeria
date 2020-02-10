<?php
class Ajustes_model extends CI_Model {
  public $table = 'ajustes';

  function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function insert(array $data){
    return $this->db->insert($this->table, $data);
  }

  public function fetch_ajustes($id){
    $this->db->order_by('id', 'ASC');
    $this->db->where('id_cliente', $id);
    $query = $this->db->get('ajustes');
    return $query->result();
  }
}
?>
