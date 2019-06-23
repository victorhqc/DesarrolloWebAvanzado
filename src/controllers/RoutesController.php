<?php

namespace App\Controllers;

use \Exception;
use App\Authorization\Authorization;
use App\Utils\Route;

class RoutesController {
  private $authorization;

  function __construct() {
    $this->authorization = new Authorization();
  }

  public function handle_redirection(string $route) {
    try {
      if (!$this->authorization->is_authorized()) {
        Route::redirect_to("login.php");
      }

      Route::redirect_to($route);

    } catch (\Exception $e) {
      Route::redirect_to("login.php");
    }
  }

  public function private_route() {
    try {
      if (!$this->authorization->is_authorized()) {
        Route::redirect_to("login.php");
      }

    } catch (\Exception $e) {
      Route::redirect_to("login.php");
    }
  }
}
