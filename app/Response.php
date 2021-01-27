<?php

namespace XRouter;

/**
 * @author Zubs <zubairidrisaweda@gmail.com>
 * @package XRouter
 */
class Response
{	
	public function setStatusCode(int $code)
	{
		http_response_code($code);
	}
}
