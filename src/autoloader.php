<?php

/**
 * Función que importa automáticamente los archivos de las clases específicadas. Éste procedimiento
 * es más o menos estándar en Frameworks como Laravel, y se utiliza usando el estándar PSR-4.
 * Más información al respecto puede encontrarse en:
 * - https://www.php.net/manual/en/language.oop5.autoload.php
 * - https://medium.com/@jodylecompte/making-sense-of-php-autoloading-ae1dd11678c2
 */
spl_autoload_register(function (String $class) {
  $source_path = __DIR__ . DIRECTORY_SEPARATOR;

  include_module($class, $source_path, "authorization", "App\Authorization");
  include_module($class, $source_path, "users", "App\Users");
  include_module($class, $source_path, "environment", "App\Environment");
  include_module($class, $source_path, "utils", "App\Utils");
  include_module($class, $source_path, "controllers", "App\Controllers");
});

function include_module(String $class, $source_path, $module_name, $name_space) {
  $source = $source_path . DIRECTORY_SEPARATOR . $module_name;
  $replace_root_path = str_replace($name_space, $source, $class);

  $replace_directory_separator = str_replace("\\", DIRECTORY_SEPARATOR, $replace_root_path);
  $file_path = $replace_directory_separator . ".php";

  if (file_exists($file_path)) {
    require_once($file_path);
  }
}
