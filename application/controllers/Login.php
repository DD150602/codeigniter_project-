<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ValidationModel');
		$this->load->model('UserModel');
	}
	public function index()
	{
		$this->form_validation->set_rules('user_email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('user_password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('Login');
		} else {
			$data = [
				'user_email' => $this->ValidationModel->validateField($this->input->post('user_email')),
				'user_password' => $this->ValidationModel->validateField($this->input->post('user_password'))
			];

			$login_info = $this->UserModel->login($data);

			if ($login_info['success']) {
				$this->session->set_userdata($login_info);
				redirect('Dashboard');
			} else {
				$this->session->set_flashdata('error', $login_info['message']);
				redirect('Login');
			}
		}
	}

	public function logout()
	{
		if ($this->session->userdata('success')) {
			$this->session->sess_destroy();
			redirect('Login');
		} else {
			redirect('Login');
		}
	}
}
