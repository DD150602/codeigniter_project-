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
}
