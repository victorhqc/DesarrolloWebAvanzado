<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . 'bootstrap.php');

use App\Authorization\Authorization;
use App\Utils\Route;

try {
  $authorization = new Authorization();
  $user = $authorization->get_authorized_user();

  if (!$user) {
    Route::redirect_to("login.php");
  }

  Route::redirect_to("products.php");

} catch (\Exception $e) {
  Route::redirect_to("login.php");
}
