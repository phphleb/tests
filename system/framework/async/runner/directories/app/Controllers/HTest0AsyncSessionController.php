<?php

declare(strict_types=1);

namespace App\Controllers;

use Hleb\Base\Controller;
use Hleb\HttpMethods\Intelligence\Cookies\AsyncCookies;
use Hleb\Static\Cookies;

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
}