<?php
/**
 * @var \App\Bootstrap\ContainerInterface $container
 */
echo "_FIRST-GROUP-TEMPLATE_" . $container->settings()->getParam('main', 'check-module');
