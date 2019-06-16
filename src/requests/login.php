<?php

require_once(__DIR__.'/../authorization/Authorization.php');

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
