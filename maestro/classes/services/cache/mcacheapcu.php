<?php

class MCacheAPCU extends MCacheService
{
    public $defaulTTL;
    public $cache;

    public function __construct()
    {
        //if (!function_exists('apc_cache_info') || !($cache = @apc_cache_info($cache_mode))) {
        //    echo "No cache info available.  APC does not appear to be running.";
        //    exit;
        //}
        $this->defaultTTL = Manager::getConf('cache.apc.default.ttl');
        $this->cache =  Manager::getCache();
    }

    public function add($name, $value, $ttl = 0)
    {
        //$value = serialize($value);
        //apc_add($name, $value, $ttl ? $ttl : $this->defaultTTL);
        $this->cache->set($name, $value, $ttl);
    }

    public function set($name, $value, $ttl = 0)
    {
        //$value = serialize($value);
        //apc_store($name, $value, $ttl ? $ttl : $this->defaultTTL);
        $this->cache->set($name, $value, $ttl);
    }

    public function get($name)
    {
        //$value = apc_fetch($name);
        //return unserialize($value);
        $this->cache->get($name);
    }

    public function delete($name)
    {
        //apc_delete($name);
        $this->cache->delete($name);
    }

    public function clear()
    {
        //apc_clear_cache();
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
        return true;
    }

    public function getCacheHitRatio()
    {
        return 0;
    }

}

