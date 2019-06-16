<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . 'bootstrap.php');

use App\Authorization\Authorization;

try {
  $authorization = new Authorization();
  $user = $authorization->get_authorized_user();

  if (!$user) {
    throw new Exception("You're not authorized to continue");
  }

  echo "<p>Welcome! ".$user->get_username()."</p>";

} catch (Exception $e) {
  echo "<p>uh oh</p>";
  echo "<p>$e</p>";
}
