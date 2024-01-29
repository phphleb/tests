<?php

declare(strict_types=1);

namespace App\Controllers;

use Hleb\Base\Controller;

class HTest0AddressController extends Controller
{
   public function getAddressData(): array
   {
       $route = $this->router();
       $first = $this->request()->param('first')->asString();
       $second = $this->request()->param('second')->asString();
       $method = $this->request()->getMethod();

       return [
           'name' => $route->name(),
           'address' => $route->address(
               'dynamicRoute.name',
               ['first' => $first, 'second' => $second],
               false,
               $method
           ),
           'url' => $route->url(
               'dynamicRoute.name',
               ['first' => $first, 'second' => $second],
               false,
               $method
           ),
       ];
   }

    public function getAddressStatic(): array
    {
        $first = param('first');
        $second = param('second');

        return [
            'name' => route_name(),
            'address' => address(
                'dynamicRoute.name',
                ['first' => $first, 'second' => $second],
                false,
                $method
            ),
            'url' => url(
                'dynamicRoute.name',
                ['first' => $first, 'second' => $second],
                false,
                $method
            ),
        ];
    }
}