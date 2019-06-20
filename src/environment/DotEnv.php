<?php

namespace App\Environment;

/**
 * Lee un archivo ".env" en la ruta especificada. Dicho archivo tendrá variables de ambiente. Por
 * ejemplo, teniendo un archivo ".env" conteniendo lo siguiente:
 *
 * ```
 * URL=http://localhost:8080
 * ```
 *
 * Se construye la clase
 *
 * ```php
 * use App\Environment\DotEnv;
 *
 * new DotEnv(__DIR__);
 * ```
 *
 * Al crear la clase, ésta lee y parsea el archivo, añadiendo "URL" a la configuración de ambiente,
 * en PHP al momento de ejecutarse la petición. Esto facilita que se puedan tener diferentes
 * configuraciones en desarrollo y producción.
 */
class DotEnv {
  private $filename = ".env";
  private $vars = array();

  function __construct($path) {
    $this->parse_file($path);
    $this->register_variables();
  }

  private function parse_file($path) {
    $file = fopen($path . DIRECTORY_SEPARATOR . $this->filename, "r");

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
