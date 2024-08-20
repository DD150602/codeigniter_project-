<?php

defined('BASEPATH') or exit('No direct script access allowed');

class RecoverPassword extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('ValidationModel');
    $this->load->model('UserModel');
  }
  public function index()
  {
    $this->form_validation->set_rules('user_email', 'Email', 'trim|required|valid_email');

    if ($this->form_validation->run() == false) {
      $this->session->set_flashdata('error', validation_errors());
      $this->load->view('CheckEmail');
    } else {
      $user_email = $this->ValidationModel->validateField($this->input->post('user_email'));
      if ($this->UserModel->validateEmail($user_email)) {
        $token = $this->UserModel->generateToken($user_email);
        $this->sendPasswordRecoveryEmail($user_email, $token);
        $this->session->set_flashdata('checked', 'Correo de verificacion enviado');
        redirect('ForgotPassword');
      } else {
        $this->session->set_flashdata('error', 'El correo proporcionado no existe');
        redirect('ForgotPassword');
      }
    }
  }

  public function recoverPassword()
  {
    $this->load->view('RecoverPassword');
  }

  private function sendPasswordRecoveryEmail($user_email, $token)
  {
    $this->load->helper('email_helper');
    sendRecoveryEmail($user_email, $token);
  }
}
