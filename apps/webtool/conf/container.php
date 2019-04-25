<?php
$builder = new \DI\ContainerBuilder();
$builder->addDefinitions(require 'injections.php');
$container = $builder->build();
return $container;