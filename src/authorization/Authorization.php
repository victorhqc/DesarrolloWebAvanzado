<?php

namespace App\Authorization;

use \Exception;
use App\Authorization\TextFileAuthenticator;
use App\Authorization\Authorize;

/**
 * Clase de Autenticación genérica. Utilizar esta clase cuando se quiera realizar cualquier
 * operación referente a la autenticación.
 */
class Authorization {
  private $authenticator;
  private $authorized_key = "__loggedin__";
  private $authorized_user = null;

  function __construct() {
    $this->authenticator = new TextFileAuthenticator();

    if (!$this->authenticator instanceof Authorize) {
      throw new Exception("Invalid authenticator");
    }
  }

  public function is_authorized() {
    if (!isset($_SESSION[$this->authorized_key])) {
      return false;
    }

    return true;
  }

  public function get_authorized_user() {
    if (!isset($_SESSION[$this->authorized_user])) {
      throw new Exception("Unauthorized");
    }

    return $this->authenticator->get_user($_SESSION[$this->authorized_user]);
  }

  public function authorize(string $username, string $password) {
    if ($this->is_authorized()) {
      return true;
    }

    $user = $this->authenticator->verify_user($username, $password);
    if ($user == false) {
      throw new Exception("Usuario o contraseña inválidos.");
    }

    $_SESSION[$this->authorized_key] = true;
    $_SESSION[$this->authorized_user] = $user->get_username();
  }

  public function remove_authorization() {
    session_destroy();
  }


  public function register_user(string $username, string $password, string $password2) {
    if ($password !== $password2) {
      throw new Exception("Las contraseñas no coinciden.");
    }

    return $this->authenticator->register_user($username, $password);
  }
}
