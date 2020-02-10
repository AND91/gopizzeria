<?php
class Boletos_model extends CI_Model {
  public $table = 'boletos';

  function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function insert(array $data){
    return $this->db->insert($this->table, $data);
  }

  public function fetch_boletos(){
    $this->db->order_by('id', 'ASC');
    $this->db->where('pago', "Não");
    $query = $this->db->get('boletos');
    return $query->result();
  }

  function fetch_valor_a_pagar(){
    $this->db->select('sum(valor) as valor');
    $this->db->where('pago', "Não");
    $query = $this->db->get('boletos');
    return $query->result();
  }

  public function fetch_boleto($id_boleto){
    $this->db->select('id, valor, vencimento');
    $this->db->where('id', $id_boleto);
    $query = $this->db->get('boletos');

    foreach ($query->result() as $row) {
      $output = '
      <div class="form-group">
        <label class="label-input-style" for="vencimento_boleto">Vencimento: </label>
        <input type="text" class="col-md-12" id="vencimento_boleto" name="vencimento_boleto" value="'.$row->vencimento.'" readonly>
      </div>
      <div class="form-group">
        <label class="label-input-style" for="valor_boleto">Valor: </label>
        <input type="text" class="col-md-12" id="valor_boleto" name="valor_boleto" value="'.$row->valor.'" readonly>
        <input type="hidden" name="id_boleto" value="'.$row->id.'"/>
      </div>
      <br>';
    }
    return $output;
  }
}
?>
