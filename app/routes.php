<?php

$router = new AltoRouter();

// routes mappings
$router->map('GET', '/', function() use ($blade) {
	$title = 'Kick it!';
	echo $blade->view()->make('hello', compact('title'))->render();
});

// actual routes activation
// this line of code must be there !
$match = $router->match();

if($match) {
    call_user_func($match['target'], $match['params']);
} else {
	echo "page not found";
}