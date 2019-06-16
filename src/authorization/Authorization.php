<?php

// TODO: Replace this require for a DB implementation.
require_once(__DIR__.'/TextFileAuthenticator.php');

class Authorization {
  private $authenticator;
  private $authorized_key = "__loggedin__";
  private $authorized_user = null;

  function __construct() {
    session_start();
    $this->authenticator = new TextFileAuthentication();
  }

  public function is_authorized() {
    if (!isset($_SESSION[$this->authorized_key])) {
      return false;
    }

    return true;
  }

  public function get_authorized_user() {
    if (!isset($_SESSION[$this->authorized_user])) {
      throw new Exception('Unauthorized');
    }

    return $_SESSION[$this->authorized_user];
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
