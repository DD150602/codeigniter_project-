<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ValidationModel extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('security');
  }

  private function sanitizeData($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = xss_clean($data);
    return $data;
  }

  public function validateField($data)
  {
    $words = ["<script>", "</script>", "<script src", "<script type=", "SELECT * FROM", "SELECT ", " SELECT ", "DELETE FROM", "INSERT INTO", "DROP TABLE", "DROP DATABASE", "TRUNCATE TABLE", "SHOW TABLES", "SHOW DATABASES", "<?php", "?>", "--", "^", "<", ">", "==", "=", ";", "::"];

    $data = $this->sanitizeData($data);

    foreach ($words as $word) {
      $data = str_ireplace($word, '', $data);
    }
    return $data;
  }
}
