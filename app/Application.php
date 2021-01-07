<?php

namespace App\App;

/**
 * Class Application
 */
class Application
{
	public Router $router;

	public function __construct()
	{
		$this->router = new Router();
	}

	public function get($path, $callback)
	{
		$this->router->get($path, $callback);
	}

	public function run()
	{
		$this->router->resolve();
	}
}