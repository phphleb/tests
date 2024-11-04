<?php

declare(strict_types=1);

namespace App\Controllers;

use App\RollbackItem;
use Hleb\Base\Controller;

class HTest0AsyncRollbackController extends Controller
{
   public function check(): string
   {
       $level = $this->request()->param('level')->asInt();

       $beforeData = RollbackItem::$data;
       RollbackItem::$data = $level;
       $afterData = RollbackItem::$data;

       return "SUCCESS-ROLLBACK:{$level}-DATA[{$beforeData},{$afterData}]";

   }
}
