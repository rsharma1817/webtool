<?php
$dir = dirname(__FILE__);
ini_set("error_reporting", "E_ALL & ~E_NOTICE & ~E_STRICT");
ini_set("display_errors", 1);
ini_set("log_errors",1);
ini_set("error_log","{$dir}/var/log/php_error.log");
$conf = dirname(__FILE__).'/conf/conf.php';
require_once($dir . '/vendor/autoload.php');
set_error_handler('Manager::errorHandler');
var_dump($conf);
var_dump($dir);
Manager::init($conf, $dir);
var_dump('a');
Manager::processRequest();
var_dump('b');
