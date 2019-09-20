<?php

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| First we need to get an application instance. This creates an instance
| of the application / container and bootstraps the application so it
| is ready to receive HTTP / Console requests from the environment.
|
*/

// Maestro
//ini_set("error_reporting", E_ALL && ~E_NOTICE);
//ini_set("log_errors", "on");
//ini_set("error_log", "../var/log/php_error.log");

error_reporting(E_ERROR | E_WARNING | E_PARSE);


$app = require __DIR__.'/bootstrap/app.php';

// ajusta a URI para o caso de subfolder
//$SCRIPT_NAME = str_replace(['\\', '/index.php'], ['/', ''], ($_SERVER['SCRIPT_NAME'] ?? ($_SERVER['PHP_SELF'] ?? '')));
//$_SERVER['REQUEST_URI'] = preg_replace('|' . $SCRIPT_NAME . '|', '', $_SERVER['REQUEST_URI'], 1);

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

$app->run();
