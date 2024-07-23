<?php

class UserModel extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function getUsers()
  {
    $this->db->where(array('user_state' => true));
    return $this->db->get('users')->result();
  }

  public function getUser($id)
  {
    $this->db->where(array('user_id' => $id));
    $this->db->where(array('user_state' => true));
    return $this->db->get('users')->row();
  }

  public function createUser($data)
  {
    if (!$this->validateEmail($data['user_email']) && !$this->validateUsername($data['user_username'])) {
      $this->db->insert('users', $data);
      return true;
    }
    return false;
  }

  public function updateUser($data)
  {
    if ($this->db->update('users', $data, array('user_id' => $data['user_id']))) {
      return true;
    }
    return false;
  }

  public function disableUser($data)
  {
    if ($this->db->get_where('users', array('user_id' => $data['user_id']))->row()->user_state === false) {
      return false;
    } else {
      $changes = array('user_state' => $data['user_state'], 'user_annotation' => $data['user_annotation']);
      $this->db->where('user_id', $data['user_id']);
      $this->db->update('users', $changes);
      return true;
    }
  }

  private function validateEmail($email)
  {
    $query = $this->db->get_where('users', array('email' => $email));
    if ($query->num_rows() > 0) {
      return true;
    }
    return false;
  }

  private function validateUsername($username)
  {
    $query = $this->db->get_where('users', array('username' => $username));
    if ($query->num_rows() > 0) {
      return true;
    }
    return false;
  }
}
