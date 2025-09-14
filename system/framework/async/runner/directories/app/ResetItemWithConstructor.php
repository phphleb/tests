<?php

namespace App;

use Hleb\Base\ResetInterface;

class ResetItemWithConstructor implements ResetInterface
{
   public ?int $data = null;

   public function __construct(int $data)
   {
       $this->data = $data;
   }

    public function reset(): void
   {
       $this->data = 0;
   }

   public function setData(int $data): void
   {
       $this->data = $data;
   }
}
