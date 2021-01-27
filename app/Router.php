<?php

namespace XRouter;

/**
 * @author Zubs <zubairidrisaweda@gmail.com>
 * @package XRouter
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

	public function render($view)
	{
		include_once __DIR__."../views/$view.php";
	}

	public function resolve()
	{
		$path = $this->request->getPath();
		$method = $this->request->getMethod();

		$callback = $this->routes[$method][$path] ?? false;

		// If no callback, return 404
		if ($callback === false) {
			return '<h1 style="text-align: center; margin: 300px;">404 | Not Found</h1>';
		}

		// If view (string callback), return the view
		if (is_string($callback)) {
			return $this->render($callback);
		};

		// Execute callback
		return call_user_func($callback);
	}
}
