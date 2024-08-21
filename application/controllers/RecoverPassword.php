<?php

defined('BASEPATH') or exit('No direct script access allowed');

class RecoverPassword extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('ValidationModel');
    $this->load->model('UserModel');
    $this->load->model('PasswordResetModel');
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
        $token = $this->PasswordResetModel->generateToken($user_email);
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
    $this->input->get('token');
    $reset_data = $this->PasswordResetModel->getResetDataByToken($token);

    if ($reset_data && strtotime($reset_data->ps_expires_at) > time()) {
      $this->form_validation->set_rules('user_password', 'Password', 'trim|required|min_length[8]');
      $this->form_validation->set_rules('user_password_confirm', 'Confirm Password', 'trim|required|matches[user_password]');
      if ($this->form_vlidation->run() == true) {
        $data = [
          'user_password' => $this->ValidationModel->validateField($this->input->post('user_password')),
          'user_id' => $reset_data->ps_user_id
        ];

        $this->userModel->changePassword($data);
        $this->session->set_flashdata('message', 'Contraseña actualizada exitosamente');
        redirect('login');
      }
      $this->load->view('RecoverPassword');
    }else{
      $this->session->set_flashdata('error', 'Token invalido o expirado');
    }
  }

  private function sendPasswordRecoveryEmail($user_email, $token)
  {
    $this->load->helper('email_helper');
    sendRecoveryEmail($user_email, $token);
  }
}
