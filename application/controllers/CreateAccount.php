<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CreateAccount extends CI_Controller
{
  public function createAccount()
	{
		$this->load->view('CreateAccount');
	}
}
