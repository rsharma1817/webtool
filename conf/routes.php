<?php
use function FastRoute\simpleDispatcher;
use FastRoute\RouteCollector;

$x = $_SERVER['REQUEST_URI'];

$routes = simpleDispatcher(function (RouteCollector $r) {
    $r->get('/', fnbr\main\controllers\MainController::class);
});

return $routes;