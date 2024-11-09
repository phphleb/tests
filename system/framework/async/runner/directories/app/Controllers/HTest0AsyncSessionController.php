<?php

declare(strict_types=1);

namespace App\Controllers;

use Hleb\Base\Controller;
use Hleb\HttpMethods\Intelligence\Cookies\AsyncCookies;
use Hleb\Static\Cookies;
use Hleb\Static\Session;

class HTest0AsyncSessionController extends Controller
{
   public function setSession(): string
   {
       isset($_SESSION['test-external-on']) or $_SESSION['test-external-on'] = 0;
       $_SESSION['test-external-on'] ++;

       return 'EXT-SESSION-SUCCESS';
   }

    public function setCookies(): string
    {
        $this->container->session()->set('test-cookies', $this->cookies()->get('test')->asString());
        return "EXT-COOKIES-SUCCESS";
    }

    public function increment1V1(): string
    {
        Session::increment('increment-1');

        return 'EXT-INCR-1-SUCCESS:1=' . Session::get('increment-1');
    }

    public function increment1V2(): string
    {
        Session::increment('increment-2', 2);

        return 'EXT-INCR-2-SUCCESS:1=' . Session::get('increment-1') . ':2=' . Session::get('increment-2');
    }

    public function increment1V3(): string
    {
        $this->container->session()->increment('increment-3', 3);

        return 'EXT-INCR-3-SUCCESS:1=' . Session::get('increment-3');
    }

    public function decrement1V1(): string
    {
        Session::decrement('decrement-1');

        return 'EXT-DECR-1-SUCCESS:1=' . Session::get('decrement-1');
    }

    public function decrement1V2(): string
    {
        Session::decrement('decrement-2', 2);

        return 'EXT-DECR-2-SUCCESS:1=' . Session::get('decrement-1') . ':2=' . Session::get('decrement-2');
    }

    public function counter1V1(): string
    {
        Session::counter('counter-1', 5);

        return 'EXT-CNTR-1-SUCCESS:1=' . Session::get('counter-1');
    }

    public function counter1V2(): string
    {
        Session::counter('counter-1', -2);

        return 'EXT-CNTR-2-SUCCESS:1=' . Session::get('counter-1');
    }
}
