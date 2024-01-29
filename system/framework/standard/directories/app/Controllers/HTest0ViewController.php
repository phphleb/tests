<?php

declare(strict_types=1);

namespace App\Controllers;

use Hleb\Base\Controller;
use Hleb\Constructor\Data\View;

class HTest0ViewController extends Controller
{
   public function index(): View
   {
       $code = $this->request()->param('code')->asInt();
       return view('base/view.test.php', [], $code);
   }

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

    public function subsequence_5(): void
    {
        $this->response()->setBody('_TEXT-1_');

        $this->response()->addToBody('_TEXT-1-DEL_');
        $this->response()->removeFromBody();
    }

    public function subsequence_6(): void
    {
        $this->response()->setBody('_TEXT-1-DEL_');
        $this->response()->setBody('_TEXT-1_');
    }

    public function subsequence_7(): void
    {
        $this->response()->setBody('_TEXT-1_');
        $body = $this->response()->removeFromBody();
        $this->response()->setBody($body);
    }

    public function testView(): void
    {
        echo view('parts/header');
        echo view('parts/content', ['id' => 100]);
        echo view('parts/footer');
    }
}