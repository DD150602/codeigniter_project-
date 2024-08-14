<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Projects extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('auth');
    $this->load->model('ProjectModel');
    $this->load->model('TaskModel');
    $this->load->model('ValidationModel');
  }

  public function index()
  {
    check_login();

    $data['projects'] = $this->ProjectModel->getAllProjectsByUserId($this->session->userdata('id'));
    $this->load->view('Projects_dashboard', $data);
  }

  public function insideProject($id)
  {
    $data['project'] = $this->ProjectModel->getProjectInfo($id);
    $data['tasks'] = $this->TaskModel->getAllTasksFromProject($id);
    $this->load->view('InsideProject', $data);
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
        redirect('Dashboard');
      } else {
        $this->session->set_flashdata('error', 'Project creation failed!');
      }
    }
  }

  public function updateProject()
  {

    $this->form_validation->set_rules('project_name', 'Project Name', 'required');
    $this->form_validation->set_rules('project_description', 'Description', 'required');
    $this->form_validation->set_rules('project_init_date', 'Initial date', 'required');
    $this->form_validation->set_rules('project_finish_date', 'End date');
    $this->form_validation->set_rules('project_completed', 'Status');

    if ($this->form_validation->run() == FALSE) {
      redirect('Dashboard');
    } else {
      $task_completed = $this->input->post('project_completed') ? 1 : 0;
      if ($task_completed == 1) {
        $finish_date = date("Y-m-d");
      } elseif ($this->input->post('project_finish_date') == '') {
        $finish_date = NULL;
      } else {
        $finish_date = $this->input->post('project_finish_date');
      }
      $data = [
        'project_name' => $this->ValidationModel->validateField($this->input->post('project_name')),
        'project_description' => $this->ValidationModel->validateField($this->input->post('project_description')),
        'project_init_date' => $this->ValidationModel->validateField($this->input->post('project_init_date')),
        'project_finish_date' => $finish_date,
        'project_completed' => $task_completed,
        'project_id' => $this->ValidationModel->validateField($this->input->post('project_id'))
      ];

      if ($this->ProjectModel->updateProject($data)) {
        redirect("Project/$data[project_id]");
      } else {
        $this->session->set_flashdata('error', 'Project update failed!');
      }
    }
  }

  public function createTask()
  {
    $this->form_validation->set_rules('task_name', 'Task Name', 'required');
    $this->form_validation->set_rules('task_description', 'Description', 'required');

    if ($this->form_validation->run() == FALSE) {
      redirect('Dashboard');
    } else {
      $data = [
        'task_name' => $this->ValidationModel->validateField($this->input->post('task_name')),
        'task_description' => $this->ValidationModel->validateField($this->input->post('task_description')),
        'project_id' => $this->ValidationModel->validateField($this->input->post('project_id'))
      ];

      if ($this->TaskModel->createTask($data)) {
        redirect("Project/$data[project_id]");
      } else {
        $this->session->set_flashdata('error', 'Task creation failed!');
      }
    }
  }
}
