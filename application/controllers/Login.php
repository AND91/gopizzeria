<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
  * @author Lucas AC <lucas_alves_lbas@hotmail.com>
  * @copyright 2019 - JL TECNO - Soluções para Web <http://jltecno.com.br>
**/
class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("login_model");
		$this->load->model("recuperar_model");
	}

	public function index()
	{
		if (isset($_POST['entrar'])) {
			if (!empty($this->input->post('usuario')) && !empty($this->input->post('password'))) {
				$usuario = $this->input->post('usuario');
				$password = sha1($this->input->post('password'));

				$data['login'] = $this->login_model->autentica_login($usuario);

				if (empty($data['login'])) {
					echo "<script>alert('Usuário inexistente');</script>";
				}else{
					foreach ($data['login'] as $row) {
						$id = $row->id;
						$password_bd = $row->senha;

						if ($password === $password_bd) {
							//session_destroy();
							$_SESSION['logado'] = 'true';
							redirect(base_url());
						}else{
							session_destroy();
							echo "<script>alert('Usuário ou senha incorretos');</script>";
						}
					}
				}
			}
		}

		if (isset($_POST['esqueci_senha'])) {
			$email = htmlspecialchars(preg_replace('/[^@-_.[:alnum:]_]/', '',$this->input->post('email')));

			$string_aleatoria = substr(sha1(microtime()),1,rand(20,25));
		  $token = sha1($string_aleatoria);

			//echo $string_aleatoria; echo "<br>"; echo $token; die;

			$data['login'] = $this->login_model->autentica($email);

			if (empty($data['login'])) {
				echo "<script>alert('Usuário inexistente');</script>";
			}else{
				$insert = $this->recuperar_model->insert([
					'email' => $email,
					'token' => $token
				]);



				//Variaveis de POST, Alterar somente se necessário
	    	//====================================================
	    	$enviadode = "XYZ";
	    	$nome = "XYZ";
	    	//$email = $_POST['email'];
	      $email = $email;
	    	$assunto = "Redefinir senha";
	    	$mensagem = "<h5>Você solicitou recentemente uma alteração de senha no site XYZ.<br> <a href='http://http://belissimamodas.com/index.php/recuperar/?token=$token'>Clique aqui</a> para redefinir sua senha.<br>O link expira em 2 horas.<br>Caso não tenha sido você, desconsidere este email.</h5><br><span style='color: #e56;'>E-mail automático, por favor, não responda.</span>";

	    	//echo $enviadode;
	    	//====================================================

	    	//REMETENTE --> ESTE EMAIL TEM QUE SER VALIDO DO DOMINIO
	    	//====================================================
	    	$email_remetente = "cadastro@cobranca.ml"; // deve ser uma conta de email do seu dominio
	    	//====================================================

	    	//Configurações do email, ajustar conforme necessidade
	    	//====================================================
	    	$email_destinatario = $email; // pode ser qualquer email que receberá as mensagens
	    	$email_reply = "$email";
	    	$email_assunto = "$assunto"; // Este será o assunto da mensagem
	    	//====================================================

	    	//Monta o Corpo da Mensagem
	    	//====================================================
	    	//$email_conteudo .= "<img src='http://planodeestudo.com/assets/img/banner9.5.jpg' width='100%' height= '100px' alt=''> \n";
	    	$email_conteudo = "$mensagem \n";
	      //$email_conteudo .= "<img src='http://planodeestudo.com/assets/img/banner9.5_rodape.jpg' width='100%' alt=''> \n";
	    	//====================================================

	    	//Seta os Headers (Alterar somente caso necessario)
	    	//====================================================
	    	$email_headers = implode ( "\n",array ( "From: $email_remetente", "Reply-To: $email_reply", "Return-Path: $email_remetente","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );
	    	//====================================================

	    	//Enviando o email
	    	//====================================================
	    	if (mail ($email_destinatario, $email_assunto, nl2br($email_conteudo), $email_headers)){
	    					echo "<script>alert ('E-Mail enviado com sucesso!');
	              window.location.href = 'http://belissimamodas.com/index.php/login';</script>";
	    					//header("location:{$appurl}/cadastrorealizado.php");

	    					}
	    			else{
	    					//echo "<script>alert ('Falha no envio do E-Mail!');
	    					//window.location.href = '../index.php';</script>";

	    				 }
	    		 //====================================================
			}


		}

		$this->load->view('login/login');
	}

	public function logout(){
		session_destroy();
		redirect(base_url());
	}
}
