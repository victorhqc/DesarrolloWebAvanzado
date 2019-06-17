<?php

namespace App\Utils;

class Route {
  public static function redirect_to_relative($relative_path) {
    header("Location: ".getenv('URL')."login.php");
    exit();
  }
}
