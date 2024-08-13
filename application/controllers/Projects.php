<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Projects extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('auth');
  }

  public function index()
  {
    check_login();
    $this->load->view('Projects_dashboard');
  }

  public function insideProject()
  {
    $this->load->view('InsideProject');
  }
}
