<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Projects extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('auth');
    $this->load->model('ProjectModel');
    $this->load->model('ValidationModel');
  }

  public function index()
  {
    check_login();

    $data['projects'] = $this->ProjectModel->getAllProjectsByUserId($this->session->userdata('id'));
    $this->load->view('Projects_dashboard', $data);
  }

  public function insideProject()
  {
    $this->load->view('InsideProject');
  }

  public function createProject()
  {
    $this->form_validation->set_rules('project_name', 'Project Name', 'required');
    $this->form_validation->set_rules('project_description', 'Description', 'required');

    if ($this->form_validation->run() == FALSE) {
      redirect('Dashboard');
    } else {
      $data = [
        'project_name' => $this->ValidationModel->validateField($this->input->post('project_name')),
        'project_description' => $this->ValidationModel->validateField($this->input->post('project_description')),
      ];

      if ($this->ProjectModel->createProject($data)) {
        $this->session->set_flashdata('success', 'Project created successfully!');
        redirect('Dashboard');
      } else {
        $this->session->set_flashdata('error', 'Project creation failed!');
      }
    }
  }
}
