<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
  * @author Lucas AC <lucas_alves_lbas@hotmail.com>
  * @copyright 2019 - JL TECNO - Soluções para Web <http://jltecno.com.br>
**/
class Pagamentos extends CI_Controller {
	public function __construct()
	{
    parent::__construct();
		$this->load->model("pagamentos_model");
		if (!isset($_SESSION['logado'])) {
			redirect('login');
		}
	}

	public function index()
	{
		$data['pagamentos'] = $this->pagamentos_model->fetch_todos_pagamentos();
		$data['parcelas'] = $this->pagamentos_model->fetch_parcelas();
		//var_dump($data['parcelas']); die;
		$this->load->view('pagamentos/pagamentos', $data);
	}
}
