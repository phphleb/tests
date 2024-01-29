<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

/**
 * Тестирование работы фреймворка с сессиями в асинхронном режиме.
 */
class RrBaseSessionTest extends TestCase
{
    private RoadRunnerInit $frame;

    public function __construct()
    {
        require_once __DIR__ . '/../standard_autoloader.php';

        $this->frame = new RoadRunnerInit();
    }

    /**
     * Тест установки сессии для трёх одинаковых по URL запросов в асинхронном цикле.
     * Проверка альтернативного варианта работы сессий.
     * Также проверяется закрытость запросов от передачи сессий друг к другу.
     */
    public function testAsyncSessionV1(): void
    {   
        $data = [
            $this->getWithSession(['test' => 'value']),
            $this->getWithSession([]),
            $this->getWithSession(null),
            ];
        
        $response = $this->frame->run($data);

        $commonBody = implode('|', $this->frame->handler($response, 'body'));
        $isCode200 = $this->frame->checkCode200($response);
        $originSession = json_encode([['test' => 'value', 'test-external-on' => 1], ['test-external-on' => 1], null]);
        $isSessionData = $originSession === json_encode($this->frame->handler($response, 'session'));               
        $originBody = $commonBody === $this->frame->getRepeatVal('EXT-SESSION-SUCCESS', 3);

        $this->frame->checkErrors($response);   
        $result = $originBody && $isCode200 && $isSessionData;

        $this->assertTrue($result);
    }


    public function testAsyncSessionV2(): void
    {
        $data = [
            $this->getWithSession(['test' => 'value'], $this->frame::SESSION_KEY),
            $this->getWithSession([], $this->frame::SESSION_KEY),
            $this->getWithSession([]),
            $this->getWithSession(null),
        ];

        $response = $this->frame->run($data);

        $commonBody = implode('|', $this->frame->handler($response, 'body'));
        $isCode200 = $this->frame->checkCode200($response);
        $originBody = $commonBody === $this->frame->getRepeatVal('EXT-SESSION-SUCCESS', 4);

        $this->frame->checkErrors($response);
        $result = $originBody && $isCode200;

        $this->assertTrue($result);
    }


    private function getWithSession(?array $sessionData = null, ?string $sessionId = null)
    {
        $result = $this->frame::DEFAULT_DATA;
        if (!is_null($sessionId)) {
            $sessionData[RoadRunnerInit::SESSION_ID] = $sessionId;
        }
        if (!is_null($sessionData)) {
            $result['session'] = $sessionData;
        }
        $result['uri']['path'] = '/test-session/controller';

        return $result;
    }

}