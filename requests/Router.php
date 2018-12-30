<?php

namespace App\Request;

class Router {

	protected $routes = [

		"GET" => [],

		"POST" => []

	];


	public function get($uri, $controller) {

		$this->routes["GET"][$uri] = $controller;

	}


	public function post($uri, $controller) {

		$this->routes["POST"][$uri] = $controller;

	}


	public function directTo($uri, $method) {
	
		try {

			if (array_key_exists($uri, $this->routes[$method])) {

				$this->callMethod(...$this->parseRouteString($this->routes[$method][$uri]));

			}

		} catch (\Exception $e) {

			die("Route not defined " . $e->getMessage());

		}
	
	}

	private function callMethod($controller, $method) {

		$instance = new $controller();

		if (method_exists($instance, $method)) {

			return $instance->$method();

		}

		throw new \Exception("Method or controller does not exist!");
		
	}

	//returns array with controller and method
	private function parseRouteString($route) {

		$route = "App\Controller\\$route";

		return explode('@', $route);

		//$routeArray = explode(delimiter, string)

	}
	

}