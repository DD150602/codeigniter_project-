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
      $hashed_password = password_hash($data['user_password'], PASSWORD_BCRYPT, array('cost' => 10));
      $data['user_password'] = $hashed_password;
      $this->db->insert('users', $data);
      return true;
    }
    return false;
  }

  public function updateUser($data)
  {
    $check_email = $this->db->get_where('users', array('user_email' => $data['user_email']))->row();
    if (sizeof($check_email) > 0) {
      return [
        'update' => false,
        'email_exists' => true,
        'message' => 'Este correo ya esta en uso'
      ];
    }

    $check_username = $this->db->get_where('users', array('user_username' => $data['user_username']))->row();
    if (sizeof($check_username) > 0) {
      return [
        'update' => false,
        'username_exists' => true,
        'message' => 'Este nombre de usuario ya existe en la base de datos'
      ];
    }

    if ($this->db->update('users', $data, array('user_id' => $data['user_id']))) {
      return [
        'update' => true,
        'message' => 'Usuario actualizado correctamente'
      ];
    }
    return [
      'update' => false,
      'message' => 'Error al actualizar el usuario'
    ];
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

  public function changePassword($data)
  {
    $hashed_password = password_hash($data['user_password'], PASSWORD_BCRYPT, array('cost' => 10));
    $this->db->where('user_id', $data['user_id']);
    $this->db->update('users', array('user_password' => $hashed_password));
    return [
      'update' => true,
      'message' => 'Contraseña cambiada correctamente'
    ];
  }

  public function login($data)
  {
    $this->db->where('user_email', $data['user_email']);
    $query = $this->db->get('users')->row_array();

    if (password_verify($data['user_password'], $query['user_password'])) {
      return [
        'success' => true,
        'id' => $query['user_id'],
        'username' => $query['user_username'],
        'role' => $query['user_role']
      ];
    } else {
      return [
        'success' => false,
        'message' => 'Contraseña incorrecta'
      ];
    }
  }

  private function validateEmail($email)
  {
    $query = $this->db->get_where('users', array('user_email' => $email));
    if ($query->num_rows() > 0) {
      return true;
    }
    return false;
  }

  private function validateUsername($username)
  {
    $query = $this->db->get_where('users', array('user_username' => $username));
    if ($query->num_rows() > 0) {
      return true;
    }
    return false;
  }
}
