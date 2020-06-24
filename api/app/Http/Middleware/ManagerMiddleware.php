<?php

namespace App\Http\Middleware;

use Closure;

class ManagerMiddleware
{
    /**
     * Instante Manager before executin request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $m = \Manager::getInstance();
        $m->loadAutoload(__DIR__ . '/../../../../vendor/autoload_manager.php');
        $m->loadConf(__DIR__ . '/../../../../core/conf/conf.php');
        $m->loadConf(__DIR__ . '/../../../../apps/webtool/conf/conf.php');
        return $next($request);
    }
}
