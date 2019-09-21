<?php

$dir = dirname(__FILE__);

ini_set("error_reporting", "E_ALL & ~E_NOTICE & ~E_STRICT");
ini_set("display_errors", 1);
ini_set("log_errors",1);
ini_set("error_log","{$dir}/var/log/php_error.log");

require_once($dir . '/vendor/autoload.php');

set_error_handler('Manager::errorHandler');

Manager::init();
Manager::processRequest();

/*
$container = require_once 'maestro/bootstrap.php';

$manager = $container->get(Manager::class);

$request = Zend\Diactoros\ServerRequestFactory::fromGlobals();
$response = $manager->handle($container, $request);

$manager->terminate($request, $response);
*/
/*

$conf = dirname(__FILE__).'/conf/conf.php';
set_error_handler('Manager::errorHandler');
var_dump($conf);
var_dump($dir);
Manager::init($conf, $dir);
var_dump('a');
var_dump('b');
*/
