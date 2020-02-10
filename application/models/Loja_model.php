<?php
class Loja_model extends CI_Model {
  public $table = 'clientes';

  function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function insert(array $data){
    return $this->db->insert($this->table, $data);
  }

  function fetch_clientes(){
    $this->db->order_by('id', 'ASC');
    $query = $this->db->get('clientes');
    return $query->result();
  }

  function fetch_cobranca(){
    $query = $this->db->query("SELECT * FROM `clientes` WHERE (ultimo_pagamento is null or ultimo_pagamento NOT BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE()) and saldo != 0.00");
    return $query->result();
  }

  function fetch_cliente($id){
    $this->db->order_by('id', 'ASC');
    $this->db->where('id', $id);
    $query = $this->db->get('clientes');
    return $query->result();
  }

  function fetch_edita_cliente($id){
    $this->db->select('id, nome, telefone');
    $this->db->where('id', $id);
    $query = $this->db->get('clientes');

    foreach ($query->result() as $row) {
      $output = '
      <div class="form-group">
        <label for="nome" class="label-input-style">Nome</label>
        <input type="text" class="form-control" name="nome" value="'.$row->nome.'">
      </div>
      <div class="form-group">
        <label for="telefone" class="label-input-style">Telefone</label>
        <input type="text" class="form-control telefone" name="telefone" value="'.$row->telefone.'">
      </div>
      <input type="hidden" class="form-control" name="id_cliente" value="'.$row->id.'">';
    }
    return $output;
  }

  function fetch_saldo($id){
    $this->db->select('saldo');
    $this->db->where('id', $id);
    $query = $this->db->get('clientes');
    return $query->result();
  }

  function fetch_relatorio(){
    $this->db->select('sum(saldo) as saldo, count(id) as quantidade');
    $query = $this->db->get('clientes');
    return $query->result();
  }

  function fetch_vendas_mes_atual(){
    $data_atual = date('Y-m-d');
		$dia_atual = date('d');
		$semana_atual = date('W');
		$mes_atual = date('m');

    $this->db->select('sum(valor_com_desconto) as valor');
    $this->db->where('MONTH(data_compra)', $mes_atual);
    $query = $this->db->get('pedidos');
    return $query->result();
  }

  function fetch_recebidos_mes_atual(){
    $data_atual = date('Y-m-d');
		$dia_atual = date('d');
		$semana_atual = date('W');
		$mes_atual = date('m');

    $this->db->select('sum(valor) as valor');
    $this->db->where('MONTH(data_pagamento)', $mes_atual);
    $query = $this->db->get('pagamentos');
    return $query->result();
  }

  function fetch_vendidos_por_mes(){
    $query = $this->db->query("SELECT sum(valor) as valor, extract(month from data_compra) as mes FROM pedidos group by extract(month from data_compra)");
    return $query->result();
  }

  function fetch_pagamentos_por_mes(){
    $query = $this->db->query("SELECT sum(valor) as valor, extract(month from data_pagamento) as mes FROM pagamentos group by extract(month from data_pagamento)");
    return $query->result();
  }

  function fetch_ultimas_vendas(){
    $this->db->select('*');
    $this->db->from('pedidos as p');
    $this->db->join('clientes as c', 'p.id_cliente = c.id');
    $query = $this->db->get('');
    return $query->result();
  }

  function fetch_ultimos_pagamentos(){
    $this->db->select('p.id_cliente, p.valor, p.data_pagamento, c.nome');
    $this->db->from('pagamentos as p');
    $this->db->join('clientes as c', 'p.id_cliente = c.id');
    $query = $this->db->get('');
    return $query->result();
  }

  function fetch_carrinho($id){
    $this->db->select('c.id, c.id_cliente, c.nome, c.valor');
    $this->db->from('carrinho as c');
    $this->db->where('c.id_cliente', $id);
    $query = $this->db->get('');

    $output = '<table border=1 style="width: 100%;">
    <tr>
      <th>Item</th>
      <th>Valor</th>
      <th></th>
    </tr>';

    $total = 0;
    foreach ($query->result() as $row) {
      $total = $total + $row->valor;
      $output.= '
      <tr>
        <td>'.$row->nome.'</td>
        <td>'.number_format($row->valor, 2, ',', '.').'</td>
        <td style="text-align: center;"><i class="far fa-times-circle retirar_carrinho" data-id_carrinho="'.$row->id.'" data-id_cliente="'.$row->id_cliente.'" style="color: red; cursor: pointer;"></i></td>
      </tr>';
    }
    $output.= '</table>
    <br>
    <div col-md-12 col-sm-12 col-xs-12 style="text-align: right"> Total: '.number_format($total, 2, ',', '.').'</div>
    <input type="hidden" name="total_carrinho" id="total_carrinho" value='.$total.'>';

    return $output;
  }

}
?>
