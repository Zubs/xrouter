<?php

namespace XRouter;

/**
 * @author Zubs <zubairidrisaweda@gmail.com>
 * @package XRouter
 */
class Application
{
	public Router $router;
	public Request $request;

	public function __construct()
	{
		$this->request = new Request();
		$this->router = new Router($this->request);
	}

	public function get($route, $callback)
	{
		$this->router->get($route, $callback);
	}

	public function run()
	{
		echo $this->router->resolve();
	}
}
