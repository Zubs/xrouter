<?php

require_once __DIR__.'\..\vendor\autoload.php';

use XRouter\Application;

$app = new Application();

$app->get("/", function () {
	return "Hello World";
});

$app->get("/contact", function () {
	return '<form action="/contact" method="POST"><button type="Submit">Submit</button></form>';
});

$app->post("/contact", function () {
	return "I work";
});

$app->run();
