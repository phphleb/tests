<?php

use Hleb\Reference\DbInterface;
use Hleb\Reference\LogInterface;
use Hleb\Reference\RequestInterface;
use Hleb\Reference\SettingInterface;

/** @var App\Bootstrap\Containers\TemplateContainerInterface $container */
$settings = [
    'settings.common.debug' => $container->settings()->getParam('common', 'debug'),
    'settings.is_debug' => $container->get(SettingInterface::class)->isDebug(),
];
$request = [
    'request.param.num' => $container->request()->param('num')->asInt(),
    'request.get.param.type' => $container->get(RequestInterface::class)->param('type')->asString(),
];
$log = ['has' => $container->has(LogInterface::class)];
$db = ['has' => $container->has(DbInterface::class)];

print \json_encode([
    'settings' => $settings,
    'request' => $request,
    'log' => $log,
    'db' => $db,
]);
