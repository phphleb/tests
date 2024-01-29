<?php
/** @var App\Bootstrap\Containers\TemplateContainerInterface $container */
$method = $container->request()->getMethod();

$code = Hleb\Static\Response::getStatus();

echo strtoupper("TEST-VIEW-$method-$code-SUCCESS");