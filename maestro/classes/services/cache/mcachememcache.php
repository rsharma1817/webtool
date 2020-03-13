<?php

class MCacheMemCache extends MCacheService
{
    public $defaulTTL;
    public $memcache;
    public $sessionid;

    public function __construct()
    {
        $this->memcache = new MemCache;
        if (!$this->memcache->connect($this->getConf('cache.memcache.host'), $this->getConf('cache.memcache.port'))) {
            die('Could not connect to MemCache!');
        }
        $this->defaultTTL = $this->getConf('cache.memcache.default.ttl');
        $this->sessionid = $this->manager->getSession()->getId();
    }

    public function add($name, $value, $ttl = 0)
    {
        $key = md5($this->sessionid . $name);
        $this->memcache->add($key, $value, '', $ttl ? $ttl : $this->defaultTTL);
    }

    public function set($name, $value, $ttl = 0)
    {
        $key = md5($this->sessionid . $name);
        $result = $this->memcache->set($key, $value, MEMCACHE_COMPRESSED, $ttl ? $ttl : $this->defaultTTL);
    }

    public function get($name)
    {
        $key = md5($this->sessionid . $name);
        return $this->memcache->get($key);
    }

    public function delete($name)
    {
        $key = md5($this->sessionid . $name);
        $this->memcache->delete($key);
    }

    public function clear()
    {
        $this->memcache->flush();
        $time = time() + 1; //one second future
        while (time() < $time) {
            //sleep
        }
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
