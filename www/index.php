<?php

// Start the session
session_start();

// Require composer autoloader ...
require '../vendor/autoload.php';

// Boot up Dotenv library ...
$dotenv = new Dotenv\Dotenv(dirname(__DIR__));
$dotenv->load();

// Require constants helper file ...
require '../config/constants.php';

// Finally require the routes file
require '../app/routes.php';
