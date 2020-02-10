<?php
class Lista_model extends CI_Model {
  public $table = 'lista_produtos';

  function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function insert(array $data){
    return $this->db->insert($this->table, $data);
  }

  function fetch_lista(){
    $this->db->order_by('nome', 'ASC');
    $query = $this->db->get('lista_produtos');
    return $query->result();
  }

  function fetch_existe_item($item){
    $this->db->select('p.id');
    $this->db->from('lista_produtos as p');
    $this->db->where('p.nome', $item);
    $query = $this->db->get();

    return $query->result();
  }
}
