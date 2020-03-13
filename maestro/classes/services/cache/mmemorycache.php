<?php

/**Cache simples que armazena em memória e dura somente o tempo da requisição */
class MMemoryCache extends MCacheService
{
    private $cache = [];
    private $maxSize;
    private $hit = 0;
    private $miss = 0;

    public function __construct($maxSize = 2000)
    {
        $this->maxSize = $maxSize;
    }

    public function add($name, $value, $ttl = -1)
    {
        if (isset($this->cache[$name])) {
            throw new \Exception("A chave já existe!");
        }

        $this->set($name, $value, $ttl);
    }

    public function set($name, $value, $ttl = -1)
    {
        $this->cache[$name] = $value;
        $this->trim();
    }

    private function trim()
    {
        if ($this->size() > $this->maxSize) {
            array_shift($this->cache);
        }
    }

    public function size()
    {
        return count($this->cache);
    }

    public function get($name)
    {
        if (isset($this->cache[$name])) {
            $this->hit++;
            $this->moveToTop($name);

            return $this->cache[$name];
        }

        $this->miss++;

        return null;
    }

    private function moveToTop($name)
    {
        $value = $this->cache[$name];
        unset($this->cache[$name]);
        $this->cache[$name] = $value;
    }

    public function increment($name, $by = 1)
    {
        throw new \Exception('Not implemented');
    }

    public function decrement($name, $by = 1)
    {
        throw new \Exception('Not implemented');
    }

    public function deleteMultiple(array $keys)
    {
        foreach ($keys as $key) {
            $this->delete($key);
        }
    }

    public function delete($name)
    {
        unset($this->cache[$name]);
    }

    public function clear()
    {
        $this->cache = [];
    }

    public function getKeys($pattern = '*')
    {
        throw new \Exception('Not implemented');
    }

    public function getAllKeys()
    {
        throw new \Exception('Not implemented');
    }

    public function serviceIsAvailable()
    {
        return true;
    }

    public function __destruct()
    {
        $this->traceHitRatio();
    }



    private function traceHitRatio()
    {
        $class = strtoupper(self::class);
        $hitRatio = $this->getCacheHitRatio();
        Manager::trace("[$class] Hit Ratio = $hitRatio");
    }

    public function getCacheHitRatio()
    {
        return round($this->hit / ($this->hit + $this->miss), 2);
    }
}