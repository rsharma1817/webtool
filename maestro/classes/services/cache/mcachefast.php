<?php
use Phpfastcache\CacheManager;
use Phpfastcache\Config\ConfigurationOption;
use Phpfastcache\Helper\Psr16Adapter;

class MCacheFast
{
    private $cache;

    public function __construct($driver = 'apcu') {
        $path = Manager::getHome() . '/core/var/cache';
        // Setup File Path on your config files
        CacheManager::setDefaultConfig(new ConfigurationOption([
            'path' => $path
        ]));

        $this->cache = new Psr16Adapter($driver);
    }

    public function getCache() {
        return $this->cache;
    }

}

