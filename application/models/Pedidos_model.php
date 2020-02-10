<?php
class Pedidos_model extends CI_Model {
  public $table = 'pedidos';

  function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function insert(array $data){
    return $this->db->insert($this->table, $data);
  }

  public function insert_carrinho(array $data){
    return $this->db->insert('carrinho', $data);
  }

  public function insert_parcelas(array $data){
    return $this->db->insert('parcelas', $data);
  }

  function fetch_pedidos($id){
    $this->db->order_by('id', 'DESC');
    $this->db->where('id_cliente', $id);
    $query = $this->db->get('pedidos');
    return $query->result();
  }

  function fetch_pedido($id){
    $this->db->select('p.id, p.valor as valor_pedido, p.desconto, p.valor_com_desconto, p.parcelas, p.valor_parcelas, i.nome, i.valor');
    $this->db->from('pedidos as p');
    $this->db->join('itens_pedido as i', 'p.id = i.id_pedido');
    $this->db->where('p.id', $id);
    $query = $this->db->get();

    $output = '<table border=1 style="width: 100%;">';
    $output .= '<tr><th>Nome</th><th>Valor</th></tr>';
    $total = 0;
    foreach ($query->result() as $row) {
      $id = $row->id; $valor = $row->valor_pedido; $desconto = $row->desconto; $valor_com_desconto = $row->valor_com_desconto; $parcelas = $row->parcelas; $valor_parcelas = $row->valor_parcelas;
      $output .= '<tr><td>'.$row->nome.'</td><td>'.number_format($row->valor, 2, ',', '.').'</td></tr>';
    }

    $output .= '</table>';

    $output .= '<br><h6 style="text-align: right;">Valor do pedido: R$ '.number_format($valor, 2, ',', '.').'</h6>';

    $total = $valor;
    if ($desconto != '0.00') {
      $total = $desconto;
      $output .= '<h6 style="text-align: right;">Desconto: R$ '.$desconto.'</h6>';
      $output .= '<h6 style="text-align: right;">Valor com desconto: R$ '.$valor_com_desconto.'</h6>';
    }

    if ($parcelas != '0') {
      $output .= '<h6 style="text-align: right;">'.$parcelas.' parcelas de '.number_format($valor_parcelas, 2, ',', '.').'</h6>';
    }

    $output .= '<br>
      <h6 style="text-align: right;">
        <form action="" method="post">
          <input type="hidden" name="id_cancelar" value="'.$id.'"></input>
          <input type="hidden" name="valor_pedido" value="'.$total.'"></input>
          <input type="submit" name="cancelar_venda" value="Cancelar Venda"></input>
        </form>
      </h6>';

    return $output;
  }

  function fetch_promissoria(){
    $this->db->select('p.valor, p.desconto, p.valor_com_desconto, p.parcelas, p.valor_parcelas');
    $this->db->from('pedidos as p');
    $this->db->where('p.id', $id);
    $query = $this->db->get();

    return $query->result();
  }

}
?>
