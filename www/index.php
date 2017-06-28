<?php

session_start();

// Composer autoload
require '../vendor/autoload.php';

// Dotenv
$dotenv = new Dotenv\Dotenv(dirname(__DIR__));
$dotenv->load();

require '../config/constants.php';

require '../app/routes.php';
