<?php

class User {
  private $username;
  private $password;

  function __construct($username, $password) {
    $this->username = $username;
    $this->password = $password;
  }

  get_username() {
    return $this->username;
  }

  get_password() {
    return $this->password;
  }
}
