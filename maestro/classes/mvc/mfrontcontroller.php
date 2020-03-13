<?php

class MFrontController
{

    static private $instance = NULL;
    public $context;
    private $request;
    private $response;
    public $dumpping;
    public $conf;
    public $startup;
    public $forward;
    public $result;
    public $canCallHandler;
    public $controller;
    public $controllerAction;
    public $filters;
    public $container;

    public function __construct()
    {
        Manager::logMessage('[RESET_LOG_MESSAGES]');
        Manager::logMessage('[FrontController::construct]');
        $this->request = new MRequest();
        $this->response = new MResponse();
        $this->result = NULL;
        $this->conf = Manager::$conf;
    }

    public static function getInstance()
    {
        if (self::$instance == NULL) {
            self::$instance = new MFrontController();
        }
        return self::$instance;
    }

    /**
     * Configura o FrontController para execução offline
     * @param $context string com o path do contexto
     */
    public function setupContext($context, $data = NULL)
    {
        // inicializa o contexto
        $this->context = new MContext($context);
        $this->context->setupContext();
        Manager::getInstance()->baseURL = $this->request->getBaseURL(false);
        $app = $this->context->getApp();
        Manager::getInstance()->app = $app;
        $appPath = $this->context->isCore() ? Manager::getInstance()->coreAppsPath : Manager::getInstance()->appsPath;
        Manager::getInstance()->appPath = $appPath . '/' . $app;
        // inicializa a sessão (por app)
        Manager::setSession(new MSession($app));
        Manager::getSession()->init(mrequest('sid'));
        // trata dados
        $this->removeInputSlashes();
        $this->setData($data ?: $_REQUEST);
        mtrace('DTO Data:');
        mtrace($this->getData());
        $this->loadExtensions();
        $this->init();
        $this->prepare();
    }

    /**
     * Handler online request execution (via browser)
     * @param null $data
     */
    public function handlerRequest($data = NULL)
    {
        try {
            // inicializa o contexto
            $this->context = new MContext($this->request);
            $this->context->defineContext();
            Manager::getInstance()->baseURL = $this->request->getBaseURL(false);
            $appPath = $this->context->isCore() ? Manager::getInstance()->coreAppsPath : Manager::getInstance()->appsPath;
            Manager::getInstance()->appPath = $appPath;
            // trata dados
            $this->removeInputSlashes();
            $this->setData($data ?: $_REQUEST);
            mtrace('DTO Data:');
            mtrace($this->getData());
            // cycle
            $this->init();
            do {
                $this->prepare();
                $this->handler();
            } while ($this->forward != '');
            $this->terminate();
        } catch (ENotFoundException $e) {
            $this->result = new MNotFound($e->getMessage());
        } catch (ESecurityException $e) {
            $this->result = new MInternalError($e);
        } catch (ETimeOutException $e) {
            $this->result = new MInternalError($e);
        } catch (ERuntimeException $e) {
            $this->result = new MRunTimeError($e);
        } catch (EDBException $e) {
            if (Manager::PROD()) {
                $e = new EDBException("Ocorreu um problema com o Banco de Dados.", $e->getCode());
            }
            $this->result = new MInternalError($e);
        } catch (EMException $e) {
            $this->result = new MInternalError($e);
        } catch (Exception $e) {
            $this->result = new MInternalError($e);
        }
    }

    public function handlerResponse($return = false)
    {
        if ($session = Manager::getSession()) {
            $session->freeze();
        }
        return $this->response->sendResponse($this->result, $return);
    }

    public function setData($value)
    {
        $data = new stdClass();
        // se for o $_REQUEST, converte para objeto
        $valid = (is_object($value)) || (is_array($value) && count($value));
        if ($valid) {
            foreach ($value as $name => $value) {

                if (($name[0] == '_') || ($name == '_')) {
                    continue;
                }
                if (is_string($value) && (strpos($value, 'json:') === 0)) {
                    $value = json_decode(substr($value, 5));
                }
                if (strpos($name, '::') !== false) {
                    list($obj, $name) = explode('::', $name);
                    if ($data->{$obj} == '') {
                        $data->{$obj} = (object)[];
                    }
                    $data->{$obj}->{$name} = $value;
                } elseif (strpos($name, '_') !== false) {
                    list($obj, $name, $extra) = explode('_', $name);
                    if ($name == '') {
                        $name = $extra;
                    }
                    if ($data->{$obj} == '') {
                        $data->{$obj} = (object)[];
                    }
                    $data->{$obj}->{$name} = $value;
                } else {
                    $data->{$name} = $value;
                }
            }
        }
        Manager::setData($data);
    }

    public function getData()
    {
        return Manager::getData();
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function setResult($result)
    {
        $this->result = $result;
    }

    public function getResult()
    {
        return $this->result;
    }

    public function getContext()
    {
        return $this->context;
    }

    public function getController()
    {
        return $this->controller;
    }

    public function getContainer()
    {
        return $this->container;
    }

    public function getAction()
    {
        return str_replace('.', '/', $this->controllerAction);
    }

    public function setForward($action)
    {
        $this->forward = $action;
    }

    public function init()
    {
        $this->addApplicationActions();
        $this->addApplicationMessages();
        $this->controllerAction = '';
        $this->forward = '';
    }

    public function prepare()
    {
        $appPath = Manager::getAppPath();
        Manager::addAutoloadPath($appPath . '/components');

        // register MAD module, if it exists...
        $mad = Manager::getMAD();
        if ($mad != '') {
            Manager::registerAutoloader($mad, $appPath . '/modules/');
        }
        $module = $this->context->getModule();
        if ($module != '') {
            // getting the module _conf.php
            $this->addModuleConf($module);
            // getting the modules's messages
            $this->addModuleMessages($module);
        }
        $this->controllerAction = $this->forward ?: '';
        $this->forward = '';
        $this->canCallHandler(true);
    }

    public function canCallHandler($status = true)
    {
        if (func_num_args()) {
            $this->canCallHandler = $status;
        } else {
            return $this->canCallHandler;
        }
    }

    public function handler()
    {
        $confFilters = Manager::getConf('filters');
        $this->filters = array();
        if (is_array($confFilters)) {
            foreach ($confFilters as $filter) {
                $filterClass = $filter . 'Filter';
                $this->filters[$filterClass] = new $filterClass($this);
                $this->filters[$filterClass]->preProcess();
            }
        }
        Manager::$idLanguage = Manager::getSession()->idLanguage;
        if ($this->canCallHandler()) {
            // chama o handler adequado de acordo com o tipo de URL (controller, service ou component)
            $handler = 'handler' . $this->context->getType();
            $this->$handler();
        }
        // executa o pos-processamento dos filtros indicados em _conf.php
        foreach ($this->filters as $filter) {
            $filter->postProcess();
        }
    }

    // Controller

    public function handlerController()
    {
        if ($this->controllerAction == '') {
            $this->controllerAction = $this->context->getControllerAction();
        }
        mtrace('handler controllerAction=' . $this->controllerAction);
        $this->invokeController(Manager::getApp(), Manager::getModule(), $this->controllerAction);
    }

    public function invokeController($app, $module, $controllerAction)
    {
        Manager::logMessage("[FrontController::invokeController {$app}:{$module}:$controllerAction]");
        list($class, $action) = explode('.', $controllerAction);
        $this->controller = $controller = Manager::getController($app, $module, $class);
        $controller->setParams($this->getData());
        $controller->setData();
        $controller->init();
        $controller->dispatch($action);
    }

    // Service

    public function handlerService()
    {
        if ($this->controllerAction == '') {
            $this->controllerAction = $this->context->getService() . '.' . $this->context->getAction();
        }
        mtrace('handler serviceAction=' . $this->controllerAction);
        $this->invokeService(Manager::getApp(), Manager::getModule(), $this->controllerAction);
    }

    public function invokeService($app, $module, $controllerAction)
    {
        Manager::logMessage("[FrontController::invokeService {$app}:{$module}:$controllerAction]");
        list($class, $action) = explode('.', $controllerAction);
        $this->controller = $controller = Manager::getService($app, $module, $class);
        $controller->setParams($this->getData());
        $controller->setData();
        $controller->init();
        $controller->dispatch($action);
    }

    // API

    public function handlerAPI()
    {
        $api = $this->context->getAPI();
        $service = $this->context->getService();
        $system = $this->context->getSystem();
        $action = $this->context->getAction();
        //mtrace('handler apiService=' . $api . ($system ? '.' . $system : '') . $service);
        $this->invokeAPI(Manager::getApp(), Manager::getModule(), $api, $service, $system, $action);
    }

    public function invokeAPI($app, $module, $api, $service, $system, $action)
    {
        Manager::logMessage("[FrontController::invokeAPI {$app}:{$module}:{$api}:{$service}:{$system}:{$action}]");
        //$this->controller = $controller = Manager::getAPIService($app, $module, $api, $system, $service);
        $className = "App\\Services\\{$service}\\{$system}Service";
        $controller = new $className;
        $controller->setParams($this->getData());
        $controller->setData();
        $controller->init();
        $controller->dispatch($action);
    }

    // Component

    public function handlerComponent()
    {
        $module = $this->context->getModule();
        $component = $this->context->getComponent();
        mtrace('handler component=' . $component);
        $fileName = $component . '.php';
        $file = Manager::getAppPath('components/' . $fileName, $module);
        if (file_exists($file)) {
            include_once($file);
            $control = new $component;
            $action = $this->context->getAction();
            if ($action) {
                $content = $control->$action();
            } else {
                $content = $control->generate();
            }
            Manager::getPage()->setContent($content);
            if (Manager::isAjaxCall()) {
                $this->setResult(new MRenderJSON());
            } else {
                $this->setResult(new MRenderPage());
            }
        } else {
            throw new ERunTimeException(_M("App: [{$this->context->getApp()}], Module: [{$this->context->getModule()}], Component: [{$component}] not found!"));
        }
    }

    public function terminate()
    {
        $controllers = Manager::getControllers();
        if (count($controllers)) {
            foreach ($controllers as $controller) {
                $controller->terminate();
            }
        }
    }

    public function addApplicationMessages()
    {
        $msgDir = Manager::getAppPath('conf/');
        Manager::$msg->addMessages($msgDir);
    }

    public function addApplicationActions()
    {
        $actionsFile = Manager::getAppPath('conf/actions.php');
        if (file_exists($actionsFile)) {
            Manager::loadActions($actionsFile);
        } else {
            $actions = Manager::getConf('ui.actions');
            if ($actions != '') {
                $actionsFile = Manager::getAppPath('conf/' . $actions);
                if (file_exists($actionsFile)) {
                    Manager::loadActions($actionsFile);
                }
            }
        }
    }

    public function addModuleConf($module)
    {
        $configFile = Manager::getModulePath($module, 'conf/conf.php');
        Manager::loadConf($configFile);
    }

    public function addModuleMessages($module)
    {
        $msgDir = Manager::getModulePath($module, 'conf/');
        Manager::$msg->addMessages($msgDir);
    }

    public static function removeInputSlashesValue($value)
    {
        if (is_array($value)) {
            return array_map(array('MFrontController', 'removeInputSlashesValue'), $value);
        }
        return stripslashes($value);
    }

    public function removeInputSlashes()
    {
        $_REQUEST = array_map(array('MFrontController', 'removeInputSlashesValue'), $_REQUEST);
    }

}
