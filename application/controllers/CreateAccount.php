<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CreateAccount extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ValidationModel');
		$this->load->model('UserModel');
	}
	public function createAccount()
	{
		$this->form_validation->set_rules('user_name', 'First Name', 'required|alpha|min_length[2]|max_length[50]');
		$this->form_validation->set_rules('user_lastname', 'Last Name', 'required|alpha|min_length[2]|max_length[50]');
		$this->form_validation->set_rules('user_username', 'Username', 'required|alpha_numeric|min_length[4]|max_length[20]|is_unique[users.user_username]');
		$this->form_validation->set_rules('user_email', 'Email', 'required|valid_email|is_unique[users.user_email]');
		$this->form_validation->set_rules('user_password', 'Password', 'required|min_length[8]');
		$this->form_validation->set_rules('user_password_confirm', 'Confirm Password', 'required|matches[user_password]');
		$this->form_validation->set_rules('role_id', 'Role', 'required|integer');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('CreateAccount');
		} else {
			$userData = array(
				'user_name'     => $this->ValidationModel->validateField($this->input->post('user_name')),
				'user_lastname' => $this->ValidationModel->validateField($this->input->post('user_lastname')),
				'user_email'    => $this->ValidationModel->validateField($this->input->post('user_email')),
				'user_username' => $this->ValidationModel->validateField($this->input->post('user_username')),
				'user_password' => $this->ValidationModel->validateField($this->input->post('user_password')),
				'role_id'       => $this->ValidationModel->validateField($this->input->post('role_id'))
			);

			if ($this->UserModel->createUser($userData)) {
				$this->session->set_flashdata('success', 'Cuenta creada correctamente!');
				redirect('Login');
			} else {
				$this->session->set_flashdata('error', 'Fallo al intentar crar la cuenta, intentalo de nuevo.');
			}
		}
	}
}
