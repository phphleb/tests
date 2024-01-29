<?php
/** @var App\Bootstrap\ContainerInterface $container */

echo strtoupper("MODULE-{$container->settings()->getModuleName()}-SECTION-TEMPLATE");
