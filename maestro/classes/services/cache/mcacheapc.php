<?php

class MCacheAPC extends MCacheService
{
    public $defaulTTL;

    public function __construct()
    {
        if (!function_exists('apc_cache_info') || !($cache = @apc_cache_info($cache_mode))) {
            echo "No cache info available.  APC does not appear to be running.";
            exit;
        }
        $this->defaultTTL = $this->getConf('cache.apc.default.ttl');
    }

    public function add($name, $value, $ttl = 0)
    {
        $value = serialize($value);
        apc_add($name, $value, $ttl ? $ttl : $this->defaultTTL);
    }

    public function set($name, $value, $ttl = 0)
    {
        $value = serialize($value);
        apc_store($name, $value, $ttl ? $ttl : $this->defaultTTL);
    }

    public function get($name)
    {
        $value = apc_fetch($name);
        return unserialize($value);
    }

    public function delete($name)
    {
        apc_delete($name);
    }

    public function clear()
    {
        apc_clear_cache();
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

