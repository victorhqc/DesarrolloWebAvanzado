<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . 'bootstrap.php');

use App\Controllers\IndexController;

$controller = new IndexController();
$controller->handle_redirection();
