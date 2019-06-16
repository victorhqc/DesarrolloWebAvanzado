<?php

spl_autoload_register(function (String $class) {
  $source_path = __DIR__ . DIRECTORY_SEPARATOR;

  include_module($class, $source_path, 'authorization', 'App\Authorization');
  include_module($class, $source_path, 'users', 'App\Users');
});

function include_module(String $class, $source_path, $module_name, $name_space) {
  $source = $source_path . DIRECTORY_SEPARATOR . $module_name;
  $replace_root_path = str_replace($name_space, $source, $class);

  $replace_directory_separator = str_replace('\\', DIRECTORY_SEPARATOR, $replace_root_path);
  $file_path = $replace_directory_separator . '.php';

  if (file_exists($file_path)) {
    require($file_path);
  }
}
