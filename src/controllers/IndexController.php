<?php

namespace App\Controllers;

use \Exception;
use App\Authorization\Authorization;
use App\Utils\Route;

class IndexController {
  private $authorization;

  function __construct() {
    $this->authorization = new Authorization();
  }

  public function handle_redirection() {
    try {
      if (!$this->authorization->is_authorized()) {
        Route::redirect_to("login.php");
      }

      Route::redirect_to("welcome.php");

    } catch (\Exception $e) {
      Route::redirect_to("login.php");
    }
  }
}
