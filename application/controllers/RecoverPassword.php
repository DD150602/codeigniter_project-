<?php

defined('BASEPATH') or exit('No direct script access allowed');

class RecoverPassword extends CI_Controller
{
  public function index()
  {
    $this->load->view('CheckEmail');
  }

  public function checkEmail()
  {

    $this->load->view('RecoverPassword');
  }
}
