<?php

declare(strict_types=1);

namespace App\Controllers\Event;

use Hleb\Base\Controller;
use Hleb\Reference\RequestInterface;

// Проверка Event для контроллера.
class HTestEventController extends Controller
{
    public function index(\DateTime $time, string $test = 'default', ?string $constructTime = null): array
    {
        return [
            'time' => $time->format('Y-m-d'),
            'test' => $test,
            'constructTime' => $constructTime,
        ];
    }

    public function hidden(): string
    {
        return 'HIDDEN_TEXT';
    }

    public function testEventAfterOnce1(): void
    {
        echo '_AFTER_ONCE_TEST_';
    }

    public function testEventAfter2(): void
    {
        echo '_AFTER_2_TEST_';
    }

    public function testEventAfter3(): void
    {
        echo '_AFTER_3_TEST_';
    }

    public function checkController1(): void
    {
        echo '[CONTROLLER-1]';
    }

    public function testEventArgs1(string $arg): void
    {
       echo "[CN_ARG-1=$arg]";
    }

    public function testEventArgs2(RequestInterface $request, string $arg): void
    {
        echo "[CN_ARG-2=$arg]+" . $request::class . ']';
    }

}
