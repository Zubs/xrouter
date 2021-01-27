<?php

namespace App\App;

/**
 * @author Zubs <zubairidrisaweda@gmail.com>
 * @package App\App
 */
class Router
{
	public Request $request;
	protected array $routes = [];

	/**
	 * @param App\Core\Request $request;
	 */
	public function __construct(Request $request)
	{
		$this->request = $request;
	}

	public function get($route, $callback)
	{
		$this->routes['get'][$route] = $callback;
	}

	public function resolve()
	{
		$path = $this->request->getPath();
		$method = $this->request->getMethod();

		$callback = $this->routes[$method][$path] ?? false;
		if ($callback === false) {
			echo '<h1 style="text-align: center; margin: 300px;">404 | Not Found</h1>';
			exit;
		}
		echo call_user_func($callback);
	}
}
