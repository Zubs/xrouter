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
use XRouter\XRouter;

$app = new XRouter();
```

The created application can now take requests, as such:
```
$app->get("/", function () {
	return "Hello World";
});
```

Or you pass in a view (a PHP file), instead of a closure. Like so:
```
$app->get("/", "welcome");
```
This looks for a ```welcome.php``` file in the ```views``` folder in the project root.

And finally, run the application
```
$app->run();
```
