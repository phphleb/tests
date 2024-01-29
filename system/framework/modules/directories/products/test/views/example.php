<?php
/** @var App\Bootstrap\ContainerInterface $container */

echo strtoupper("PRODUCTS-MODULE-{$container->settings()->getModuleName()}-TEMPLATE");
