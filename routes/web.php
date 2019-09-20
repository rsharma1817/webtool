<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

/*
$router->get('/', function () use ($router) {
    return $router->app->version();
});
*
 */

$routes = [
    'main' => [
        'main' => \fnbr\main\controllers\MainController::class,
    ]
];

//mtrace('---uri');
//mtrace($_SERVER) ;

$router->get('/{app}/{module}/{handler}/{action}[/{id}]', function($app, $module,  $handler, $action, $id = null) use ($routes) {
    mtrace('routing app = '  . $app);
    mtrace('routing module = '  . $module);
    mtrace('routing handler = '  . $handler);
    mtrace('routing action = '  . $action);
    mtrace('routing id = '  . $id);
    return \Manager::handler($module, $handler, $action, $routes);
});

$router->get('/', function() use ($routes) {
    return \Manager::handler('main', 'main', 'main', $routes);
});

//$router->get('/user/{id}', 'Common\UsuarioController@listTeste');

