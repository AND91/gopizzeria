<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
  * @author Lucas AC <lucas_alves_lbas@hotmail.com>
  * @copyright 2017 - JL TECNO - Soluções para Web <http://jltecno.com.br>
**/
class Recuperar extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("login_model");
		$this->load->model("recuperar_model");
	}

  public function index(){
    $token = htmlspecialchars($_GET['token']);

    if (isset($_POST['alterar'])) {
      $data['token'] = $this->recuperar_model->token($token);

      if (empty($data['token'])) {
        echo "<script>alert('Token inválido ou expirado!');</script>";
      }else{
        $nova_senha = sha1($this->input->post('nova_senha'));
        $repita_nova_senha = sha1($this->input->post('repita_nova_senha'));
        if ($nova_senha != $repita_nova_senha) {
          echo"<script>
            alert('As senhas digitadas são diferentes!');
          </script>";
        }else{
          foreach ($data['token'] as $row) {
            $email = $row->email;
          }
          $this->db->set('senha', $nova_senha);
          $this->db->where('email', $email);
          $this->db->update('acesso');

          $this->db->where('email', $email);
    			$this->db->delete('recuperar_senha');

          redirect('login');
        }
      }
    }

		$data['token'] = $token;

    $this->load->view('recuperar/recuperar', $data);
  }

}
