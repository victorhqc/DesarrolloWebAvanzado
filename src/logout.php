<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . "bootstrap.php");

use App\Authorization\Authorization;
use App\Utils\Route;

$authorization = new Authorization();
$authorization->remove_authorization();

Route::redirect_to("login.php");
