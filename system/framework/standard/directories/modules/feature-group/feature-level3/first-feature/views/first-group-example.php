<?php
/**
 * @var \App\Bootstrap\ContainerInterface $container
 */
echo "_FIRST-GROUP-LEVEL3-TEMPLATE_" . $container->settings()->getParam('main', 'check-module');
