<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . 'bootstrap.php');

use App\Authorization\Authorization;
use App\Environment\DotEnv;
use App\Utils\Route;

try {
  new DotEnv(__DIR__);

  $authorization = new Authorization();
  $user = $authorization->get_authorized_user();

  if (!$user) {
    Route::redirect_to_relative("login.php");
  }

  Route::redirect_to_relative("products.php");

} catch (\Exception $e) {
  Route::redirect_to_relative("login.php");
}
