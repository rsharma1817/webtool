<?php

class MCache extends MCacheService
{
    public $type;
    public $cache;

    public function __construct($type = 'php')
    {
        $this->type = $type;
        $class = "MCache" . $type;
        $this->cache = new $class();
    }

    public function add($name, $value, $ttl = 0)
    {
        $this->cache->set($name, $value, $ttl);
    }

    public function set($name, $value, $ttl = 0)
    {
        $this->cache->set($name, $value, $ttl);
    }

    public function get($name)
    {
        return $this->cache->get($name);
    }

    public function delete($name)
    {
        $this->cache->delete($name);
    }

    public function clear()
    {
        $this->cache->clear();
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

}
