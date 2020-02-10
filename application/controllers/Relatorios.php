<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
  * @author Lucas AC <lucas_alves_lbas@hotmail.com>
  * @copyright 2019 - JL TECNO - Soluções para Web <http://jltecno.com.br>
**/
class Relatorios extends CI_Controller {
	public function __construct()
	{
    parent::__construct();
		$this->load->model("loja_model");
		$this->load->model("pedidos_model");
		$this->load->model("itens_model");
		$this->load->model("pagamentos_model");
		$this->load->model("boletos_model");
		if (!isset($_SESSION['logado'])) {
			redirect('login');
		}
	}

  public function index()
	{

		$data['vendas_mes_atual'] = $this->loja_model->fetch_vendas_mes_atual();
		$data['recebidos_mes_atual'] = $this->loja_model->fetch_recebidos_mes_atual();
		$data['relatorio'] = $this->loja_model->fetch_relatorio();
		$data['vendidos_por_mes'] = $this->loja_model->fetch_vendidos_por_mes();
		$data['pagamentos_por_mes'] = $this->loja_model->fetch_pagamentos_por_mes();
		$data['ultimas_vendas'] = $this->loja_model->fetch_ultimas_vendas();
		$data['ultimos_pagamentos'] = $this->loja_model->fetch_ultimos_pagamentos();


		/*$data['vendas_mes_atual'] = $this->loja_model->fetch_vendas_mes_atual();
		$data['recebidos_mes_atual'] = $this->loja_model->fetch_recebidos_mes_atual();
		$data['caixa'] = $this->loja_model->fetch_caixa();
		$data['valor_a_pagar'] = $this->boletos_model->fetch_valor_a_pagar();
		$data['relatorio'] = $this->loja_model->fetch_relatorio();*/

    $this->load->view('relatorios/relatorios', $data);
  }
}
