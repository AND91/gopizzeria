<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
  * @author Lucas AC <lucas_alves_lbas@hotmail.com>
  * @copyright 2019 - JL TECNO - Soluções para Web <http://jltecno.com.br>
**/
class Produtos extends CI_Controller {
	public function __construct()
	{
    parent::__construct();
		$this->load->model("lista_model");
		if (!isset($_SESSION['logado'])) {
			redirect('login');
		}
	}

	public function index()
	{
    if (isset($_POST['cadastro_produto'])) {
      $insert = $this->lista_model->insert([
				'nome' => $this->input->post('nome')
			]);
      redirect('produtos');
    }
		$data['lista'] = $this->lista_model->fetch_lista();
		//var_dump($data['lista']); die;
		$this->load->view('produtos/produtos', $data);
	}
}
