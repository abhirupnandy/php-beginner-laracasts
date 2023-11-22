<?php
	
	use JetBrains\PhpStorm\NoReturn;
	
	$routes = require 'routes.php';
	
	#[NoReturn] function abort($value = 404): void
	{
		http_response_code($value);
		require "controllers/{$value}.php";
		die();
	}
	
	function routeToController($uri, $routes): void
	{
		if ( array_key_exists($uri, $routes) ) {
			require $routes[$uri];
		} else {
			abort();
		}
	}
	
	$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
	routeToController($uri, $routes);