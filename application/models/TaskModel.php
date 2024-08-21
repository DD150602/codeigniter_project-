<?php

class TaskModel extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }
  public function getAllTasksFromProject($id)
  {
    $this->db->where('task_state', true);
    $this->db->where('project_id', $id);
    return $this->db->get('tasks')->result();
  }

  public function getTaskById($id)
  {
    $this->db->where('id', $id);
    return $this->db->get('tasks')->row();
  }

  public function createTask($data)
  {
    $this->db->trans_start();

    $this->db->insert('tasks', array(
      'task_name' => $data['task_name'],
      'task_description' => $data['task_description'],
      'project_id' => $data['project_id']
    ));

    $task_id = $this->db->insert_id();

    $this->db->insert('users_has_tasks', array(
      'user_id' => $this->session->userdata('id'),
      'task_id' => $task_id
    ));

    if ($this->db->trans_status() == FALSE) {
      $this->db->trans_rollback();
      return false;
    } else {
      $this->db->trans_commit();
      return true;
    }
  }

  public function updateTask($id, $data)
  {
    if ($this->db->update('tasks', $data, array('task_id' => $id))) {
      return true;
    }
    return false;
  }

  public function deleteTask($data)
  {
    if ($this->db->get_where('projects', array('task_id' => $data['task_id']))->row()->task_state === false) {
      return false;
    } else {
      $changes = array('task_state' => $data['task_state'], 'task_annotation' => $data['task_annotation']);
      $this->db->where('task_id', $data['task_id']);
      $this->db->update('tasks', $changes);
      return true;
    }
    return false;
  }
}
