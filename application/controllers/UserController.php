<?php

defined('BASEPATH') or exit('No direct script access allowed');

class UserController extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('UserModel');
    $this->load->model('ValidationModel');
  }
  public function updateInfo()
  {
    $this->form_validation->set_rules('user_name', 'First Name', 'required|alpha|min_length[2]|max_length[50]');
    $this->form_validation->set_rules('user_lastname', 'Last Name', 'required|alpha|min_length[2]|max_length[50]');
    $this->form_validation->set_rules('user_username', 'Username', 'required|alpha_numeric|min_length[4]|max_length[20]|is_unique[users.user_username]');
    $this->form_validation->set_rules('user_email', 'Email', 'required|valid_email|is_unique[users.user_email]');

    if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata('validation_errors', validation_errors());
      redirect('Dashboard');
    } else {
      $userData = array(
        'user_name'     => $this->ValidationModel->validateField($this->input->post('user_name')),
        'user_lastname' => $this->ValidationModel->validateField($this->input->post('user_lastname')),
        'user_email'    => $this->ValidationModel->validateField($this->input->post('user_email')),
        'user_username' => $this->ValidationModel->validateField($this->input->post('user_username')),
      );

      $result = $this->UserModel->updateUser($userData);

      if ($result['update'] == false) {
        $this->session->set_flashdata('error', $result['message']);
        $this->load->view('Projects');
      }
      // elseif ($result['update'] == false) {
      //   $this->session->set_flashdata('error', $result['message']);
      //   $this->load->view('Projects');
      // }
      else {
        $this->session->set_flashdata('realization', $result['message']);
        $this->load->view('Projects');
      }
    }
  }

  public function updatePassword()
  {

    $this->form_validation->set_rules('Old_password', 'Old Password', 'required');
    $this->form_validation->set_rules('user_password', 'Password', 'required|min_length[8]');
    $this->form_validation->set_rules('user_password_confirm', 'Confirm Password', 'required|matches[user_password]');

    if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata('validation_errors', validation_errors());
      redirect('Dashboard');
    } else {
      $data = array(
        'user_password' => $this->ValidationModel->validateField($this->input->post('user_password')),
        'user_id' => $this->session->userdata('id')
      );

      $result = $this->UserModel->changePassword($data);
      if ($result['update'] == false) {
        $this->session->set_flashdata('error', $result['message']);
        redirect('Dashboard');
      } else {
        $this->session->set_flashdata('realization', $result['message']);
        redirect('Dashboard');
      }
    }
  }
}
