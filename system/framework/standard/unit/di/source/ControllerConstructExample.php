<?php

namespace Phphleb\TestO\Di;

use Hleb\Base\Controller;
use Hleb\Reference\LogInterface;
use Hleb\Reference\RequestInterface;

class ControllerConstructExample extends Controller
{
   public function __construct(
       private readonly RequestInterface $request,
       private readonly LogInterface     $log,
       private readonly EmptyDto         $dto,
       private readonly ServiceExample   $service,
       array                             $config = []
   )
   {
       parent::__construct($config);
   }

   public function getConstructData(): array
   {
       return [
           'config' => gettype($this->config),
           'log' => $this->log::class,
           'request' => $this->request::class,
           'dto' => $this->dto::class,
           'service' => $this->service::class,
           'service.log' => $this->service->log::class,
           'service.test' => $this->service->test,
       ];
   }
}