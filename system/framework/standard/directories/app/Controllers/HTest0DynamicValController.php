<?php

declare(strict_types=1);

namespace App\Controllers;

use Hleb\Base\Controller;
use Hleb\Constructor\Data\View;

class HTest0DynamicValController extends Controller
{  
    // Прямое получение массива данных.
   public function index(): array
   {
       return $this->request()->rawData();
   }

   public function usingTemplate(): View
   {
       $data = $this->request()->data();

       return view('dynamic/template', [
           'first' => isset($data['first']) ? $data['first']->asString(null) : null,
           'second' => isset($data['second']) ? $data['second']->asString(null) : null,
           'third' => isset($data['third']) ? $data['third']->asString(null) : null,
       ]);
   }
}