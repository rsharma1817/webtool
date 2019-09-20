<?php

namespace App\Http\Middleware;

use Closure;

class ContextMiddleware
{
    private $context;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        \Manager::setRequest($request);
        $this->context = new \MContext($request);
        $this->context->defineContext();
        \Manager::getInstance()->baseURL = $request->getBaseURL(false);
        $app = \Manager::getApp();
        //\Manager::getInstance()->app = $app;
        $appPath = $this->context->isCore() ? \Manager::getInstance()->coreAppsPath : \Manager::getInstance()->appsPath;
        \Manager::getInstance()->appPath = $appPath . '/' . $app;
        // inicializa a sessão (por app)
        \Manager::setSession(new \MSession($app));
        \Manager::getSession()->init(mrequest('sid'));
        // trata dados
        \Manager::setData((object)$_REQUEST);

        if ($this->context->isAjax()) {
            \Manager::$ajax = new \MAjax();
            \Manager::$ajax->initialize(\Manager::getOptions('charset'));
        }

        $uiAutoload = \Manager::getAppPath("ui/autoload.php");
        if (file_exists($uiAutoload)) {
            mtrace('using app ui: ' . $uiAutoload);
            \Manager::loadAutoload($uiAutoload);
        }

        $actionsFile = \Manager::getAbsolutePath('conf/actions.php');
        if (file_exists($actionsFile)) {
            \Manager::loadActions($actionsFile);
        } else {
            $actions = \Manager::getConf('ui.actions');
            if ($actions != '') {
                $actionsFile = Manager::getAbsolutePath('conf/' . $actions);
                if (file_exists($actionsFile)) {
                    \Manager::loadActions($actionsFile);
                }
            }
        }

        return $next($request);
    }

    public function terminate($request, $response)
    {
        if ($session = \Manager::getSession()) {
            $session->freeze();
        }
    }

}
