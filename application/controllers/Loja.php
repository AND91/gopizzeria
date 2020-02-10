<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
  * @author Lucas AC <lucas_alves_lbas@hotmail.com>
  * @copyright 2019 - JL TECNO - Soluções para Web <http://jltecno.com.br>
**/
class Loja extends CI_Controller {
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
		if (isset($_POST['cadastro_cliente'])) {
			$insert = $this->loja_model->insert([
				'nome' => $this->input->post('nome'),
				'telefone' => $this->input->post('telefone'),
				'saldo' => '0'
				]);

				if ($insert) {
					redirect(base_url());
				}else{
					show_error('Erro ao cadastrar cliente');
				}
		}

		

		$data['clientes'] = $this->loja_model->fetch_clientes();

		$this->load->view('loja', $data);
	}
}
