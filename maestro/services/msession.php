<?php

use Zend\Session;

class MSession extends Zend\Session\SessionManager
{

    private $app;
    private $container;

    /**
     * Cada app deve ter seu proprio container para a sessão.
     * MSession constructor.
     * @param string $app
     */
    public function __construct($app = '')
    {
        parent::__construct();
        $this->app = $app ?: 'manager';
    }

    public function __get($var)
    {
        return $this->container->$var;
    }

    public function __set($var, $value)
    {
        $this->container->$var = $value;
    }

    public function init($sid = '')
    {
        try {
            if ($sid != '') {
                parent::setId($sid);
            }
            parent::start();
            //$this->default = $this->container('Manager');
            $this->container = $this->container($this->app);
            if (!$this->container->timestamp) {
                $this->container->timestamp = time();
            }
        } catch (EMException $e) {
            throw $e;
        }
    }

    public function checkTimeout($exception = false)
    {
        $timeout = Manager::getConf('session.timeout');
        // If 0, we are not controling session
        if ($timeout != 0) {
            $timestamp = time();
            $difftime = $timestamp - $this->container->timestamp;
            $this->timeout = ($difftime > ($timeout * 60));
            $this->container->timestamp = $timestamp;
            if ($this->timeout) {
                $this->destroy();
                if ($exception) {
                    throw new ETimeOutException();
                } else {
                    return true;
                }
            }
        }
        return false;
    }

    public function container($namespace)
    {
        return new MSessionContainer($namespace);
    }

    public function get($var)
    {
        return $this->container->$var;
    }

    public function set($var, $value)
    {
        $this->container->$var = $value;
    }

    public function freeze()
    {
        $this->writeClose();
    }

    public function getValue($var)
    {
        return $this->get($var);
    }

    public function setValue($var, $value)
    {
        $this->set($var, $value);
    }

}
