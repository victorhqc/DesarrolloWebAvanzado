<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . "autoloader.php");

session_start();

use App\Environment\DotEnv;

new DotEnv(__DIR__);
