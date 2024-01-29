<?php

namespace Phphleb\TestO\Di;

use Hleb\Base\Controller;
use Hleb\Reference\LogInterface;
use Hleb\Reference\RequestInterface;

class ControllerMethodExample extends Controller
{
   public array $data = [];

    public function action(
        RequestInterface $request,
        LogInterface     $log,
        EmptyDto         $dto,
        ServiceExample   $service,
        string           $test = 'default',
    ): void
    {
        $this->data = [
            'request' => $request::class,
            'log' => $log::class,
            'dto' => $dto::class,
            'service' => $service::class,
            'test' => $test,
        ];
    }

    public function action2(
        RequestInterface $request,
        LogInterface     $log,
        EmptyDto         $dto,
        ServiceExample   $service,
        string           $test,
    ): void
    {
        $this->data = [
            'request' => $request::class,
            'log' => $log::class,
            'dto' => $dto::class,
            'service' => $service::class,
            'test' => $test,
        ];
    }
}