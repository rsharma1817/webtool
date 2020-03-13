<?php

class MCachePHP extends MCacheService
{
    public $session;

    public function __construct()
    {
        $this->session = $this->manager->getSession();
    }

    public function add($name, $value, $ttl = 0)
    {
        $this->session->set($name, $value);
    }

    public function set($name, $value, $ttl = 0)
    {
        $this->session->set($name, $value);
    }

    public function get($name)
    {
        return $this->session->get($name);
    }

    public function getKeys($pattern = '*') {
        return [];
    }

    public function getAllKeys() {
        return [];
    }

    public function deleteMultiple(array $keys) {
        return true;
    }

    public function increment($name, $by = 1) {
        return true;
    }

    public function decrement($name, $by = 1) {
        return true;
    }

    public function serviceIsAvailable() {
        return false;
    }

    public function getCacheHitRatio()
    {
        return 0;
    }

    public function delete($name)
    {
        // TODO: Implement delete() method.
    }

    public function clear()
    {
        // TODO: Implement clear() method.
    }
}

