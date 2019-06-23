<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . "bootstrap.php");

use App\Controllers\RoutesController;

$controller = new RoutesController();
$controller->handle_redirection("welcome.php");
