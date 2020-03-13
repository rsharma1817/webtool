<?php

$dir = dirname(__FILE__);
ini_set("error_reporting", "E_ALL & ~E_NOTICE & ~E_STRICT");
ini_set("display_errors", 1);
ini_set("log_errors",1);
ini_set("error_log","{$dir}/storage/logs/php_error.log");
ini_set("session.save_path",  "{$dir}/storage/framework/sessions");
$conf = $dir . '/conf/conf.php';
require_once($dir . '/vendor/autoload.php');
set_error_handler('Manager::errorHandler');
Manager::init($conf, $dir, 'webtool');
//Manager::processRequest();
$app = require $dir . '/bootstrap/app.php';
$app->run();
