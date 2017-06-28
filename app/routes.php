<?php

$router = new AltoRouter();


$router->map('GET', '/', 'PagesController@home');

// Routes activation, this line must be there !
$match = $router->match();


if ($match === false) {
	echo "no match found";
} else {
    list($controller, $action) = explode('@', $match['target']);

    $controller = '\\App\\Controllers\\'.$controller;
    $controller = new $controller(new Philo\Blade\Blade('../resources/views', '../cache/views'));

    if (is_callable([$controller, $action])) {
    	$controller->{$action}();
    } else {
    	echo "Couldn't call controller action for this route";
    }
}
