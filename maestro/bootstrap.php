<?php
/**
 * The bootstrap file creates and returns the container.
 */
use DI\ContainerBuilder;

$containerBuilder = new ContainerBuilder();
$containerBuilder->useAutowiring(false);
$containerBuilder->useAnnotations(false);



$containerBuilder->addDefinitions(require __DIR__ . '/../conf/definitions.php');
$container = $containerBuilder->build();

return $container;
