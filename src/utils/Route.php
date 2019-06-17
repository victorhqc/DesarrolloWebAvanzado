<?php

namespace App\Utils;

class Route {
  public static function redirect_to_relative($relative_path) {
    header("Location: ".self::get_relative_route($relative_path));
    exit();
  }

  public static function get_relative_route($relative_path) {
    return getenv('URL').$relative_path;
  }
}
