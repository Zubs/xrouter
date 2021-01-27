# XRouter
> Currently accepts only get requests

## Installation
```
composer require zubs/xrouter
```

## Usage
In your ```index.php``` file:

Require autoload, to have access to all of the packages classes
```
require_once __DIR__.'\..\vendor\autoload.php';
```
> It is assumed that your ```index.php``` file is in a ```public``` folder.

Now, you can use the ```XRouter``` class to create an application.
```
use XRouter\Application;

$app = new Application();
```

The created application can now take requests, as such:
```
$app->router->get("/", function () {
	return "Hello World";
});
```

And finally, run the application
```
$app->run();
```
