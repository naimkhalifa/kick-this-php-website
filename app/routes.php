<?php

// Instanciate the router
$router = new AltoRouter();

// Routes mappings ...
$router->map('GET', '/', 'PagesController@home');
$router->map('GET', '/contact', 'ContactController@showContact');
$router->map('POST', '/contact', 'ContactController@postContactForm');

// Routes activation
$match = $router->match();


if ($match === false) {
	// Couldn't find a route corresponding to the requested url
	echo "no match found";
} else {
	// Fetch the controller action related to the requested url
    list($controller, $action) = explode('@', $match['target']);
    $controller = '\\App\\Controllers\\'.$controller;
    $controller = new $controller(new Philo\Blade\Blade('../resources/views', '../cache/views'));

    // Try to call the controller action
    if (is_callable([$controller, $action])) {
    	$controller->{$action}();
    } else {
    	echo "Couldn't call controller action for this route";
    }
}
