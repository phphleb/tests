<?php

declare(strict_types=1);

namespace App\Controllers;

use Hleb\Base\Controller;
use Hleb\Constructor\Data\View;

class HTest0BaseController extends Controller
{
   public function simulateOptions(): string
   {
       return 'EXAMPLE-OPTIONS';
   }

   public function usingView(): View
   {
       return view('test');
   }

    public function getJson(): array
    {
        return ['name' => 'd\'Artagnan'];
    }

    public function insertController(): string
    {
        return (new HTest0InsertController($this->config))->get();
    }

    public function getName() {

       return $this->router()->name();
    }
}