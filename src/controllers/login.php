<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'bootstrap.php');

use App\Authorization\Authorization;
use App\Utils\Route;

try {
  $authorization = new Authorization();

  if (!isset($_POST['username']) || !isset($_POST['password'])) {
    throw new Exception("Please, submit username & password");
  }

  $username = $_POST['username'];
  $password = $_POST['password'];

  $authorization->authorize($username, $password);
  Route::redirect_to("index.php");

} catch (Exception $e) {
  Route::redirect_with_data("login.php", array(
    'error' => $e->getMessage()
  ));
}
