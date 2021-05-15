<?php

namespace XRouter;

/**
 * @author Zubs <zubairidrisaweda@gmail.com>
 * @package XRouter
 */
class XRouter
{
	public Router $router;
	public Request $request;
	public Response $response;

	public function __construct()
	{
		$this->request = new Request();
		$this->response = new Response();
		$this->router = new Router($this->request, $this->response);
	}

	public function get($route, $callback)
	{
		$this->router->get($route, $callback);
	}

	public function post($route, $callback)
	{
		$this->router->post($route, $callback);
	}

	public function run()
	{
		echo $this->router->resolve();
	}
}
