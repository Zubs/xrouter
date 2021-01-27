<?php

require_once __DIR__.'\..\vendor\autoload.php';

use App\App\Application;

$app = new Application();

$app->router->get("/", function () {
	return "Hello World";
});

$app->run();
