<?php
class Pagamentos_model extends CI_Model {
  public $table = 'pagamentos';

  function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function insert(array $data){
    return $this->db->insert($this->table, $data);
  }

  function fetch_todos_pagamentos(){
    $this->db->select('p.valor, p.data_pagamento, c.id, c.nome, c.saldo');
    $this->db->from('pagamentos as p');
    $this->db->join('clientes as c', 'p.id_cliente = c.id', 'left');
    $query = $this->db->get('');
    return $query->result();
  }

  function fetch_pagamentos($id){
    $this->db->order_by('id', 'DESC');
    $this->db->where('id_cliente', $id);
    $query = $this->db->get('pagamentos');
    return $query->result();
  }

  function fetch_total_pagamentos($id){
    $this->db->select('sum(valor) as total');
    $this->db->where('id_cliente', $id);
    $query = $this->db->get('pagamentos');
    return $query->result();
  }

  function fetch_parcelas(){
    $this->db->select('p.id as id_parcela, p.id_pedido, p.parcela, p.valor_parcela, p.vencimento, p.restante, c.id as id_cliente, c.nome');
    $this->db->from('parcelas as p');
    $this->db->join('pedidos as pe', 'p.id_pedido = pe.id');
    $this->db->join('clientes as c', 'pe.id_cliente = c.id');
    $query = $this->db->get('');
    return $query->result();
  }

  function fetch_parcelas_cliente($id){
    $this->db->select('p.id as id_parcela, p.id_pedido, p.parcela, p.valor_parcela, p.vencimento, p.restante, c.id as id_cliente, c.nome');
    $this->db->from('parcelas as p');
    $this->db->join('pedidos as pe', 'p.id_pedido = pe.id');
    $this->db->join('clientes as c', 'pe.id_cliente = c.id');
    $this->db->where('c.id', $id);
    $query = $this->db->get('');
    return $query->result();
  }
}
?>
