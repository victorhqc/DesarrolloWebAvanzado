<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . "bootstrap.php");


use App\Utils\Route;
use App\Controllers\ProductController;
use App\Authorization\Authorization;

$controller = new ProductController();
$controller->delete($_REQUEST['key']);

Route::redirect_to("list.php");