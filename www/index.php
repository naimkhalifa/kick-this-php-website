<?php

// Composer autoload
require '../vendor/autoload.php';

// Constants
require '../config/constants.php';

// Setup Blade view engine
use Philo\Blade\Blade;

$views = '../resources/views';
$cache = '../cache/views';
$blade = new Blade($views, $cache);

require '../app/routes.php';