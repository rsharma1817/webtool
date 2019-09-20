<?php

class MMessages
{

    public $lang;
    public $file;
    public $msg = array();

    public function __construct($lang = '')
    {
        $this->lang = $lang;
        $this->file = 'messages.' . ($lang ? $lang . '.' : '') . 'php';
    }

    public function loadMessages()
    {
        $file = Manager::getFrameworkPath('conf/' . $this->file);
        $msg = file_exists($file) ? require($file) : array();
        $this->msg = array_merge($this->msg, $msg);
    }

    public function addMessages($dir, $file = '')
    {
        if ($file == '') {
            $msgFile = realpath($dir . '/' . $this->file);
        } else {
            $msgFile = realpath($dir . '/' . $file);
        }
        if (file_exists($msgFile)) {
            $msg = @include_once($msgFile);
            $this->msg = array_merge($this->msg, $msg ?: array());
        }
    }

    public function get($key, $parameters = array())
    {
        $msg = vsprintf($this->msg[$key], $parameters);
        return $msg;
    }

    public function set($key, $msg)
    {
        $this->msg[$key] = $msg;
    }

}
