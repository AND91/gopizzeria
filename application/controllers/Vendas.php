<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
  * @author Lucas AC <lucas_alves_lbas@hotmail.com>
  * @copyright 2019 - JL TECNO - Soluções para Web <http://jltecno.com.br>
**/
class Vendas extends CI_Controller {
	public function __construct()
	{
    parent::__construct();
		$this->load->model("loja_model");
		if (!isset($_SESSION['logado'])) {
			redirect('login');
		}
	}

	public function index()
	{
		$data['clientes'] = $this->loja_model->fetch_clientes();

		$this->load->view('vendas/vendas', $data);
	}
}
