<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'bootstrap.php');

use App\Authorization\Authorization;

try {
  $authorization = new Authorization();

  if (!isset($_POST['username']) || !isset($_POST['password'])) {
    throw new Exception("Please, submit username & password");
  }

  $username = $_POST['username'];
  $password = $_POST['password'];

  $authorization->authorize($username, $password);

} catch (Exception $e) {
  echo "<p>uh oh</p>";
  echo "<p>$e</p>";
}
