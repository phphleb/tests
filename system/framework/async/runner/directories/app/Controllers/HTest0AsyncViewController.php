<?php

declare(strict_types=1);

namespace App\Controllers;

use Hleb\Base\Controller;
use Hleb\Constructor\Data\View;

class HTest0AsyncViewController extends Controller
{
   // Тест совмещения различных видов вывода текста.
   public function subsequence_1(): string
   {
       $this->response()->addToBody('_TEXT-3_');
       echo '_TEXT-1_';
       $this->response()->addToBody('_TEXT-4_');
       echo '_TEXT-2_';

       return '_TEXT-5_';
   }

    public function subsequence_2(): void
    {
        $this->response()->addToBody('_TEXT-1_');
        $this->response()->addToBody('_TEXT-2_');
    }

    public function subsequence_3(): void
    {
        $this->response()->addToBody('_TEXT-3_');
        echo '_TEXT-1_';
        $this->response()->addToBody('_TEXT-4_');
        echo '_TEXT-2_';
    }

    public function subsequence_4(): View
    {
        $this->response()->addToBody('_TEXT-3_');
        echo '_TEXT-1_';
        $this->response()->addToBody('_TEXT-4_');
        echo '_TEXT-2_';

        return view('base/view.response');
    }
}