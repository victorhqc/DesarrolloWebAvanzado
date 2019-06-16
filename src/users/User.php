<?php

namespace App\Users;

class User {
  private $username;
  private $password;

  function __construct($username, $password) {
    $this->username = $username;
    $this->password = $password;
  }

  public function get_username() {
    return $this->username;
  }

  public function get_password() {
    return $this->password;
  }
}
