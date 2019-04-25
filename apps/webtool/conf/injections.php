<?php

return [
    'webtool\services\\*' => function (\DI\Container $c, \DI\Factory\RequestedEntry $entry) {
        if (class_exists($entry->getName())) {
            $class = $entry->getName();
            $reflection = new ReflectionClass($class);
            $params = $reflection->getConstructor()->getParameters();
            $constructor = array();
            foreach ($params as $param) {
                $constructor[] = $c->get($param->getClass()->getName());
            }
            return new $class(...$constructor);
        } else {
            return false;
        }
    },
    'webtool\controllers\\*' => function (\DI\Container $c, \DI\Factory\RequestedEntry $entry) {
        if (class_exists($entry->getName())) {
            $class = $entry->getName();
            $controller = new $class();
            return $controller;
        } else {
            return false;
        }
    }

];