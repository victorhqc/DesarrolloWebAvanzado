<?php

// TODO: Replace this require for a DB implementation.
require_once('TextFileAuthorization.php');

class Authorization {
  private $authenticator;
  private $authorized_key = "__loggedin__";
  private $authorized_user = null;

  function __construct() {
    $this->authenticator = new TextFileAuthentication();
  }


  public function is_authorized() {
    return $_SESSION[$this->authorized_key] && $_SESSION[$this->authorized_key];
  }

  public function authorize($username, $password) {
    if ($this->is_authorized()) {
      return true;
    }

    $user = $this->authenticator->verify_user($username, $password);
    if ($user == false) {
      throw new Exception("Invalid user or password");
    }

    $_SESSION[$this->authorized_key] = true;
    $_SESSION[$this->authorized_user] = $user;

  }

  public function remove_authorization() {

  }
}
