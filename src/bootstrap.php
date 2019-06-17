<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . 'autoloader.php');

use App\Environment\DotEnv;

new DotEnv(__DIR__);
