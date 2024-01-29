<?php

declare(strict_types=1);

namespace App\Controllers;

use Hleb\Base\Controller;
use Hleb\Static\Settings;

class HTest0BeforeActionController extends Controller
{
    protected function beforeAction(): string
    {
        return 'ERROR';
    }

    public function index(): string
    {
        return 'ACTION-SUCCESS';
    }

    public function methodNameSuccess(): string
    {
        return (string)Settings::getControllerMethodName();
    }

    public function methodNameFromContainerSuccess(): string
    {
        return $this->container->settings()->getControllerMethodName();
    }
}