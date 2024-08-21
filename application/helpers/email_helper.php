<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('sendRecoveryEmail')) {
  function sendRecoveryEmail($email, $token)
  {
    $CI = &get_instance();
    $CI->load->library('email');

    $config = array(
      'protocol' => '',
      'smtp_host' => '',
      'smtp_port' => ,
      'smtp_user' => '',
      'smtp_pass' => '',
      'mailtype'  => 'html',
      'charset'   => 'utf-8',
      'newline'   => "\r\n",
    );
    $CI->email->initialize($config);

    $CI->email->from('dylancubos2@gmail.com', 'Dylan Delgado');
    $CI->email->to($email);
    $CI->email->subject('Password Recovery');
    $CI->email->message("Click this link to recover your password: " . base_url("RecoverPassword/recoverPassword?token=" . $token));

    $CI->email->send();
  }
}
