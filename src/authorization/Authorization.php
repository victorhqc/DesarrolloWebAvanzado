<?php

namespace App\Authorization;

use App\Authorization\TextFileAuthenticator;

class Authorization {
  private $authenticator;
  private $authorized_key = "__loggedin__";
  private $authorized_user = null;

  function __construct() {
    session_start();
    $this->authenticator = new TextFileAuthenticator();
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

    return $this->authenticator->get_user($_SESSION[$this->authorized_user]);
  }

  public function destroy_session() {
    session_destroy();
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
    $_SESSION[$this->authorized_user] = $user->get_username();
  }

  public function remove_authorization() {

  }
}
