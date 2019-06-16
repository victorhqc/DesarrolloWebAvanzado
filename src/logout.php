<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . 'bootstrap.php');

use App\Authorization\Authorization;

$authorization = new Authorization();
$authorization->remove_authorization();
