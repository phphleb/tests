<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Commands\AttributeDisableTask;
use App\Commands\AttributePurposeConsoleTask;
use App\Commands\AttributePurposeExternalTask;
use App\Commands\AttributePurposeFullTask;
use App\Commands\AttributeTask;
use Hleb\Base\Controller;


class HTest0TaskAttributeController extends Controller
{
    public function disableOff(): string
    {
        $task = new AttributeDisableTask();
        $status = $task->call();
        $result = $task->getResult();
        return $result . '#' . $status;
    }

    public function disableOn(): string
    {
        $task = new AttributeTask();
        $status = $task->call();
        $result = $task->getResult();
        return $result . '#' . $status;
    }

    public function purposeFull(): string
    {
        $task = new AttributePurposeFullTask();
        $status = $task->call();
        $result = $task->getResult();
        return $result . '#' . $status;
    }

    public function purposeExternal(): string
    {
        $task = new AttributePurposeExternalTask();
        $status = $task->call();
        $result = $task->getResult();
        return $result . '#' . $status;
    }

    public function purposeConsole(): string
    {
        $task = new AttributePurposeConsoleTask();
        $status = $task->call();
        $result = $task->getResult();
        return $result . '#' . $status;
    }
}