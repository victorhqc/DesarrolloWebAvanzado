<?php

namespace App\Environment;

class DotEnv {
  private $filename = '.env';
  private $vars = array();

  function __construct($path) {
    $this->parse_file($path);
    $this->register_variables();
  }

  private function parse_file($path) {
    $file = fopen($path . DIRECTORY_SEPARATOR . $this->filename, 'r');

    if (!$file) {
      return;
    }

    while(!feof($file)) {
      $raw_var = fgets($file);

      if (!strrchr($raw_var, "=")) {
        continue;
      }

      [$key, $value] = explode("=", $raw_var);

      array_push($this->vars, [trim($key), trim($value)]);
    }

    fclose($file);
  }

  private function register_variables() {
    foreach ($this->vars as [$key, $value]) {
      $r = putenv($key."=".$value);
    }
  }
}
