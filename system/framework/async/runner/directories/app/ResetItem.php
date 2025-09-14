<?php

namespace App;

use Hleb\Base\ResetInterface;

class ResetItem implements ResetInterface
{
   public ?int $data = null;

   public function reset(): void
   {
       $this->data = 0;
   }

   public function setData(int $data): void
   {
       $this->data = $data;
   }
}
