<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . "bootstrap.php");


use App\Utils\Route;
use App\Controllers\ProductController;
use App\Authorization\Authorization;

$controller = new ProductController();
$controller->add($_REQUEST['brandProduct'],$_REQUEST['nameProduct'],$_REQUEST['descriptionProduct']);

Route::redirect_to("products.php");
