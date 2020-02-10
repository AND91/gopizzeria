<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
  * @author Lucas AC <lucas_alves_lbas@hotmail.com>
  * @copyright 2018 - JL TECNO - Soluções para Web <http://jltecno.com.br>
**/
class Welcome extends CI_Controller {
	public function index()
	{
		$this->load->view('welcome_message');
	}
}
