<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;
use Phphleb\Tests\AsyncLogger\AsyncLoggerTestException;

/**
 * Тестирование фреймворка на работоспособность в асинхронном режиме
 * при использовании Swoole и базовая проверка маршрутизатора.
 */
class SwooleBaseFrameworkTest extends TestCase
{
    private SwooleInit $frame;

    public function __construct()
    {
        require_once __DIR__ . '/../standard_autoloader.php';

        $this->frame = new SwooleInit();
    }

    /**
     * Тест одного запроса в асинхронном цикле.
     *
     * @throws AsyncLoggerTestException
     */
    public function testAsyncQueryV1(): void
    {
        $response = $this->frame->run();

        $commonBody = implode('|', $this->frame->handler($response, 'body'));
        $isCode200 = $this->frame->checkCode200($response);
        $this->frame->checkErrors($response);

        $result = ($commonBody === 'ASYNC-SUCCESS') && $isCode200;

        $this->assertTrue($result);
    }

    /**
     * Тест трёх одинаковых запросов в асинхронном цикле.
     *
     * @throws AsyncLoggerTestException
     */
    public function testAsyncQueryV2(): void
    {
        $data = [
            $this->frame::DEFAULT_DATA,
            $this->frame::DEFAULT_DATA,
            $this->frame::DEFAULT_DATA
        ];
        $response = $this->frame->run($data);
        $commonBody = implode('|', $this->frame->handler($response, 'body'));
        $isCode200 = $this->frame->checkCode200($response);
        $this->frame->checkErrors($response);

        $result = ($commonBody === $this->frame->getRepeatVal('ASYNC-SUCCESS', 3)) && $isCode200;

        $this->assertTrue($result);
    } 
}