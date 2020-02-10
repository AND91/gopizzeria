<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
  * @author Lucas AC <lucas_alves_lbas@hotmail.com>
  * @copyright 2019 - JL TECNO - Soluções para Web <http://jltecno.com.br>
**/
class Cliente extends CI_Controller {
	public function __construct()
	{
    parent::__construct();
		$this->load->model("loja_model");
		$this->load->model("pedidos_model");
		$this->load->model("itens_model");
		$this->load->model("pagamentos_model");
		$this->load->model("lista_model");
		$this->load->model("ajustes_model");
		if (!isset($_SESSION['logado'])) {
			redirect('login');
		}
	}

  public function index()
	{
    redirect(base_url());
  }

	public function detalhe($id)
	{

		if (isset($_POST['editar_cliente'])) {
			$this->db->set('nome', $this->input->post('nome'));
			$this->db->set('telefone', $this->input->post('telefone'));
			$this->db->where('id', $this->input->post('id_cliente'));
			$this->db->update('clientes');

			redirect('cliente/detalhe/'.$this->input->post('id_cliente').'');
		}

		if (isset($_POST['ajustar_saldo'])) {
			$saldo = $this->input->post('saldo') - $this->input->post('valor');

			$this->db->set('saldo', $saldo);
			$this->db->where('id', $this->input->post('id_cliente'));
			$this->db->update('clientes');

			$insert = $this->ajustes_model->insert([
				'id_cliente' => $this->input->post('id_cliente'),
				'valor' => $this->input->post('valor'),
				'comentario' => $this->input->post('comentario'),
			]);

			redirect('cliente/detalhe/'.$this->input->post('id_cliente').'');
		}

    if (isset($_POST['fazer_venda'])) {

			if (isset($_POST['desconto'])) {
				$valor_com_desconto = $this->input->post('total_com_desconto');
			}else{
				$valor_com_desconto = $this->input->post('total');
			}

			$insert = $this->pedidos_model->insert([
				'id_cliente' => $this->input->post('id_cliente'),
				'valor' => $this->input->post('total'),
				'valor_com_desconto' => $valor_com_desconto,
				'parcelas' => $this->input->post('total_parcelas'),
				'valor_parcelas' => $this->input->post('valor_parcelas')
			]);

			$this->db->select_max('id');
			$query = $this->db->get_where('pedidos')->result();
			foreach ($query as $row){
				$id_pedido = $row->id;
			}

			$this->db->where('id_cliente', $this->input->post('id_cliente'));
			$carrinho = $this->db->get('carrinho')->result();

			foreach($carrinho as $row) {
				$insert = $this->itens_model->insert([
					'id_pedido' => $id_pedido,
					'nome' => $row->nome,
					'valor' => $row->valor,
				]);
	    }

			$vencimentos = $this->input->post('vencimento_parcela[]');

			$parcela = 1;
			foreach($vencimentos as $key => $value) {
				$insert = $this->pedidos_model->insert_parcelas([
					'id_pedido' => $id_pedido,
					'parcela' => $parcela,
					'valor_parcela' => $this->input->post('valor_parcelas'),
					'vencimento' => $value,
					'restante' => $this->input->post('valor_parcelas')
				]);
				$parcela = $parcela + 1;
	    }

			// Atualizar saldo do cliente
			$saldo = $this->loja_model->fetch_saldo($this->input->post('id_cliente'));

			foreach ($saldo as $row) {
				$saldo = $row->saldo;
			}

			$saldo = $saldo + $valor_com_desconto;

			$today = date('Y-m-d');
			$this->db->set('saldo', $saldo);
			$this->db->set('ultima_compra', $today);
			$this->db->where('id', $this->input->post('id_cliente'));
			$this->db->update('clientes');

			$this->db->where('id_cliente', $this->input->post('id_cliente'));
			$this->db->delete('carrinho');

			redirect('cliente/detalhe/'.$this->input->post('id_cliente').'');
    }

		if (isset($_POST['fazer_pagamento'])) {
			$this->db->select('saldo');
	    $this->db->where('id', $this->input->post('id_cliente'));
	    $query = $this->db->get('clientes')->result();

			foreach ($query as $row) {
				$saldo = $row->saldo;
			}

			$diferenca_saldo = $saldo - $this->input->post('valor');
			$diferenca_parcela = $this->input->post('restante') - $this->input->post('valor');

			$today = date('Y-m-d');
			$this->db->set('saldo', $diferenca_saldo);
			$this->db->set('ultimo_pagamento', $today);
			$this->db->where('id', $this->input->post('id_cliente'));
			$this->db->update('clientes');

			$insert = $this->pagamentos_model->insert([
				'id_cliente' => $this->input->post('id_cliente'),
				'valor' => $this->input->post('valor')
			]);

			$this->db->set('restante', $diferenca_parcela);
			$this->db->where('id', $this->input->post('id_parcela'));
			$this->db->update('parcelas');

			redirect('cliente/detalhe/'.$this->input->post('id_cliente').'');
		}

		if (isset($_POST['cancelar_venda'])) {
			$this->db->where('id', $this->input->post('id_cancelar'));
			$this->db->delete('pedidos');

			$this->db->where('id_pedido', $this->input->post('id_cancelar'));
			$this->db->delete('itens_pedido');

			$saldo = $this->loja_model->fetch_saldo($id);
			//var_dump($saldo);

			foreach ($saldo as $row) {
				$saldo = $row->saldo;
			}

			$saldo = $saldo - $this->input->post('valor_pedido');

			$this->db->set('saldo', $saldo);
			$this->db->where('id', $id);
			$this->db->update('clientes');

			redirect('cliente/detalhe/'.$id.'');
		}

		$data['cliente'] = $this->loja_model->fetch_cliente($id);
		$data['parcelas'] = $this->pagamentos_model->fetch_parcelas_cliente($id);
		$data['pedidos'] = $this->pedidos_model->fetch_pedidos($id);
		$data['pagamentos'] = $this->pagamentos_model->fetch_pagamentos($id);
		$data['total_pagamentos'] = $this->pagamentos_model->fetch_total_pagamentos($id);
		$data['lista'] = $this->lista_model->fetch_lista($id);
		$data['ajustes'] = $this->ajustes_model->fetch_ajustes($id);
		$data['id'] = $id;
    $this->load->view('cliente/detalhe', $data);
  }

	public function fetch_edita_cliente(){
		if ($this->input->post('id_cliente')) {
			echo $this->loja_model->fetch_edita_cliente($this->input->post('id_cliente'));
		}
	}

	public function fetch_pedido(){
		if ($this->input->post('id_pedido')) {
			echo $this->pedidos_model->fetch_pedido($this->input->post('id_pedido'));
		}
	}

	public function fetch_carrinho(){
		if ($this->input->post('id_cliente')) {
			echo $this->loja_model->fetch_carrinho($this->input->post('id_cliente'));
		}
	}

	public function inserir_carrinho(){
		if ($this->input->post('insert_carrinho')) {
			$insert_carrinho = $this->input->post('insert_carrinho');

			$insert = $this->pedidos_model->insert_carrinho([
				'id_cliente' => $insert_carrinho[0],
				'nome' => $insert_carrinho[1],
				'valor' => $insert_carrinho[2]
			]);

			if ($insert) {
				$id_cliente = $insert_carrinho[0];
				echo $this->loja_model->fetch_carrinho($id_cliente);
			}else{
				echo false;
			}
		}
	}

	public function retirar_carrinho(){
		if ($this->input->post('retirar_carrinho')) {
			$retirar_carrinho = $this->input->post('retirar_carrinho');
			$id_carrinho = $retirar_carrinho[1];
			$this->db->where('id', $id_carrinho);
			$this->db->delete('carrinho');

			$id_cliente = $retirar_carrinho[0];
			echo $this->loja_model->fetch_carrinho($id_cliente);
		}
	}

	public function promissoria($id){
		$this->db->select('*');
		$this->db->from('empresa');
		$empresa = $this->db->get()->result();

		$this->db->select('p.*, c.nome as nome_cliente');
		$this->db->from('pedidos as p');
    $this->db->join('clientes as c', 'p.id_cliente = c.id');
    $this->db->where('p.id', $id);
    $query = $this->db->get()->result();

		$this->db->select('*');
    $this->db->from('itens_pedido');
    $this->db->where('id_pedido', $id);
    $itenspedido = $this->db->get()->result();

		$this->load->view('cliente/promissoria',[
			'empresa' => $empresa,
			'promissoria' => $query,
			'itenspedido' => $itenspedido
		]);
	}

}
