<?php

namespace App\Controllers;

use \Exception;
use App\Authorization\Authorization;
use App\Utils\Route;

class SignupController {
  private $authorization;

  function __construct() {
    $this->authorization = new Authorization();
  }

  public function handle_signup() {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      return $this->signup();
    }

    if ($this->authorization->is_authorized()) {
      Route::redirect_to("index.php");
    }
  }

  private function signup() {
    try {
      if (
        !isset($_POST["username"])
        || !isset($_POST["password"])
        || !isset($_POST["password2"])
      ) {
        throw new Exception("Porfavor, ingresa usuario y contraseña.");
      }

      $username = $_POST["username"];
      $password = $_POST["password"];
      $password2 = $_POST["password2"];

      $this->authorization->register_user($username, $password, $password2);

      Route::redirect_to("login.php");

    } catch (Exception $e) {
      Route::redirect_with_data("signup.php", array(
        "error" => $e->getMessage()
      ));
    }
  }
}
