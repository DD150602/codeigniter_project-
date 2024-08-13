<?php

class ProjectModel extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function getAllProjectsByUserId($id)
  {
    $this->db->select('projects.project_name, projects.project_description, projects.project_id, projects.project_init_date');
    $this->db->from('projects');
    $this->db->join('users_has_projects', 'projects.project_id = users_has_projects.project_id');
    $this->db->join('users', 'users_has_projects.user_id = users.user_id');
    $this->db->where('users.user_id', $id);
    $this->db->where('users.user_state', true);
    $this->db->where('projects.project_state', true);
    return $this->db->get()->result();
  }

  public function getProjectInfo($id)
  {
    $this->db->where('project_id', $id);
    $this->db->where('project_state', true);
    return $this->db->get('projects')->row();
  }

  public function createProject($data)
  {
    if ($this->db->insert('projects', $data)) {
      return true;
    }
    return false;
  }

  public function updateProject($data)
  {
    if ($this->db->update('projects', $data, array('project_id' => $data['project_id']))) {
      return true;
    }
    return false;
  }

  public function disableProject($data)
  {
    if ($this->db->get_where('projects', array('project_id' => $data['project_id']))->row()->project_state === false) {
      return false;
    } else {
      $changes = array('project_state' => $data['project_state'], 'project_annotation' => $data['project_annotation']);
      $this->db->where('project_id', $data['project_id']);
      $this->db->update('projects', $changes);
      return true;
    }
    return false;
  }
}
