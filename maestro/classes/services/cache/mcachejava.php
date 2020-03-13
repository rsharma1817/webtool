<?php

class MCacheJava extends MCacheService
{
    public $store;

    public function __construct()
    {
        $this->store = $this->manager->javaServletContext;
    }

    public function add($name, $value)
    {
        $this->store->setAttribute($name, $value);
    }

    public function set($name, $value)
    {
        $this->store->setAttribute($name, $value);
    }

    public function get($name)
    {
        return java_values($this->store->getAttribute($name));
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
