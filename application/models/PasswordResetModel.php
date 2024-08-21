<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PasswordResetModel extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function generateToken($email)
  {
    $token = bin2hex(random_bytes(50));

    $user = $this->db->get_where('users', array('user_email' => $email))->row();

    $hashed_token = password_hash($token, PASSWORD_BCRYPT, array('cost' => 10));
    $expiresAt = date("Y-m-d H:i:s", strtotime('+1 hour'));

    $data = array(
      'user_id' => $user->user_id,
      'ps_token' => $hashed_token,
      'ps_expired_at' => $expiresAt
    );

    $this->db->insert('password_resets', $data);

    return $token;
  }

  public function getResetDataByToken($token)
  {
    $token_hashed = $this->db->get_where('password_resets', ['ps_expired_at >' => date("Y-m-d H:i:s")])->row()->ps_token;
    if (password_verify($token, $token_hashed)) {
      return $this->db->get_where('password_resets', ['ps_token' => $token_hashed])->row();
    }
  }

  public function deleteToken($token)
  {
    $token_hashed = $this->db->get_where('password_resets', ['ps_expired_at >' => date("Y-m-d H:i:s")])->row()->ps_token;
    if (password_verify($token, $token_hashed)) {
      $this->db->delete('password_resets', ['ps_token' => $token_hashed]);
    }
  }
}
