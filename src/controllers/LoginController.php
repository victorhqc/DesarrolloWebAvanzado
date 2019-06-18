<?php

namespace App\Controllers;

use \Exception;
use App\Authorization\Authorization;
use App\Utils\Route;

class LoginController {
  private $authorization;

  function __construct() {
    $this->authorization = new Authorization();
  }

  public function handle_login() {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      return $this->login();
    }

    if ($this->authorization->is_authorized()) {
      Route::redirect_to("index.php");
    }
  }

  private function login() {
    try {
      $this->authorization = new Authorization();

      if (!isset($_POST['username']) || !isset($_POST['password'])) {
        throw new Exception("Porfavor, ingresa usuario y contraseña.");
      }

      $username = $_POST['username'];
      $password = $_POST['password'];

      $this->authorization->authorize($username, $password);
      Route::redirect_to("index.php");

    } catch (Exception $e) {
      Route::redirect_with_data("login.php", array(
        'error' => $e->getMessage()
      ));
    }
  }
}
