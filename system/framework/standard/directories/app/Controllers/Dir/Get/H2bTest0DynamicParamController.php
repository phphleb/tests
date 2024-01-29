<?php

declare(strict_types=1);

namespace App\Controllers\Dir\Get;

use Hleb\Base\Controller;
use Hleb\Constructor\Data\View;

class H2bTest0DynamicParamController extends Controller
{  

   public function usingFromTemplate(): View
   {
       $data = $this->request()->data();

       return view('dynamic/template', [
           'first' => isset($data['first']) ? $data['first']->asString(null) : null,
           'second' => isset($data['second']) ? $data['second']->asString(null) : null,
           'third' => isset($data['third']) ? $data['third']->asString(null) : null,
           'fourth' => isset($data['fourth']) ? $data['fourth']->asString(null) : null,
       ]);
   }

    public function getFromTemplateGet(): View
    {
        $data = $this->request()->data();

        return view('dynamic/template', [
            'first' => isset($data['first']) ? $data['first']->asString(null) : null,
        ]);
    }

    public function postFromTemplatePost(): View
    {
        $data = $this->request()->data();

        return view('dynamic/template', [
            'first' => isset($data['first']) ? $data['first']->asString(null) : null,
        ]);
    }
}