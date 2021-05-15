<?php

namespace XRouter;

/**
 * @author Zubs <zubairidrisaweda@gmail.com>
 * @package XRouter
 */
class Router
{
	public Request $request;
	public Response $response;
	protected array $routes = [];

	/**
	 * @param XRouter\Request $request;
	 * @param XRouter\Response $response;
	 */
	public function __construct(Request $request, Response $response)
	{
		$this->request = $request;
		$this->response = $response;
	}

	public function get($route, $callback)
	{
		$this->routes['get'][$route] = $callback;
	}

	public function post($route, $callback)
	{
		$this->routes['post'][$route] = $callback;
	}

	public function render($view)
	{
		if(!include_once __DIR__."../../../../../views/$view.php") {
			$this->response->setStatusCode(204);
			include_once __DIR__."/view/204.php";
			exit;
		}
	}

	public function resolve()
	{
		$path = $this->request->getPath();
		$method = $this->request->getMethod();

		$callback = $this->routes[$method][$path] ?? false;

		// If no callback, return 404
		if ($callback === false) {
			$this->response->setStatusCode(404);
			include_once __DIR__."/view/404.php";
			exit;
		}

		// If view (string callback), return the view
		if (is_string($callback)) {
			return $this->render($callback);
		};

		// Execute callback
		return call_user_func($callback);
	}
}
