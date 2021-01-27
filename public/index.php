<?php

require_once __DIR__.'\..\vendor\autoload.php';

use XRouter\Application;

$app = new Application();

$app->get("/", function () {
	return "Hello World";
});

$app->run();
