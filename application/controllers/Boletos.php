<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
  * @author Lucas AC <lucas_alves_lbas@hotmail.com>
  * @copyright 2019 - JL TECNO - Soluções para Web <http://jltecno.com.br>
**/
class Boletos extends CI_Controller {
	public function __construct()
	{
    parent::__construct();
		$this->load->model("boletos_model");
		$this->load->model("loja_model");
		if (!isset($_SESSION['logado'])) {
			redirect('login');
		}
	}

  public function index()
  {
    if (isset($_POST['cadastro_boleto'])) {
      $insert = $this->boletos_model->insert([
				'valor' => $this->input->post('valor'),
        'vencimento' => $this->input->post('vencimento'),
				'pago' => 'Não'
      ]);
      redirect('boletos');
    }

		if (isset($_POST['pagar_boleto'])) {
			$this->db->set('pago', 'Sim');
			$this->db->where('id', $this->input->post('id_boleto'));
			$this->db->update('boletos');

			$data['caixa'] = $this->loja_model->fetch_caixa();

			foreach ($data['caixa'] as $row) {
				$caixa = $row->valor;
			}

			$att_caixa = $caixa - $this->input->post('valor_boleto');

			$this->db->set('valor', $att_caixa);
			$this->db->where('id', 1);
			$this->db->update('caixa');

      redirect('boletos');
    }

    $data['boletos'] = $this->boletos_model->fetch_boletos();

    $this->load->view('boletos/boletos', $data);
  }

	public function fetch_boleto(){
		$id_boleto = $this->input->post('id_boleto');
		echo $this->boletos_model->fetch_boleto($id_boleto);
	}

}
