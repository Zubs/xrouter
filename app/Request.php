<?php

namespace XRouter;

/**
 * @author Zubs <zubairidrisaweda@gmail.com>
 * @package XRouter
 */
class Request
{	
	public function getPath()
	{
		$path = $_SERVER['REQUEST_URI'] ?? '/';
		$position = strpos($path, '?');
		if ($position === false) {
			return $path;
		}

		// Get path without query parameters
		return substr($path, 0, $position);
	}

	public function getMethod()
	{
		// Get HTTP method in lowercase
		return strtolower($_SERVER['REQUEST_METHOD']);
	}
}
