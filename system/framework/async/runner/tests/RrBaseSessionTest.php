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

    public function testAsyncIncrementV1(): void
    {
        $data = [
            $this->getWithSession([], url: '/test-extended-session/controller/increment1V1'),
            $this->getWithSession(['increment-2' => 7], url: '/test-extended-session/controller/increment1V2'),
            $this->getWithSession([], url: '/test-extended-session/controller/increment1V3'),
        ];

        $response = $this->frame->run($data);

        $commonBody = implode('|', $this->frame->handler($response, 'body'));
        $isCode200 = $this->frame->checkCode200($response);
        $originBody = $commonBody === 'EXT-INCR-1-SUCCESS:1=1|EXT-INCR-2-SUCCESS:1=:2=9|EXT-INCR-3-SUCCESS:1=3';

        $this->frame->checkErrors($response);
        $result = $originBody && $isCode200;

        $this->assertTrue($result);
    }

    public function testAsyncDecrementV1(): void
    {
        $data = [
            $this->getWithSession([], url: '/test-extended-session/controller/decrement1V1'),
            $this->getWithSession(['decrement-2' => 7], url: '/test-extended-session/controller/decrement1V2'),
        ];

        $response = $this->frame->run($data);

        $commonBody = implode('|', $this->frame->handler($response, 'body'));

        $isCode200 = $this->frame->checkCode200($response);
        $originBody = $commonBody === 'EXT-DECR-1-SUCCESS:1=-1|EXT-DECR-2-SUCCESS:1=:2=5';

        $this->frame->checkErrors($response);
        $result = $originBody && $isCode200;

        $this->assertTrue($result);
    }

    public function testAsyncCounterV1(): void
    {
        $data = [
            $this->getWithSession([], url: '/test-extended-session/controller/counter1V1'),
            $this->getWithSession(['counter-1' => 100], url: '/test-extended-session/controller/counter1V2'),
        ];

        $response = $this->frame->run($data);

        $commonBody = implode('|', $this->frame->handler($response, 'body'));

        $isCode200 = $this->frame->checkCode200($response);
        $originBody = $commonBody === 'EXT-CNTR-1-SUCCESS:1=5|EXT-CNTR-2-SUCCESS:1=98';

        $this->frame->checkErrors($response);
        $result = $originBody && $isCode200;

        $this->assertTrue($result);
    }


    private function getWithSession(
        ?array $sessionData = null,
        ?string $sessionId = null,
        string $url = '/test-session/controller',
    )
    {
        $result = $this->frame::DEFAULT_DATA;
        if (!is_null($sessionId)) {
            $sessionData[RoadRunnerInit::SESSION_ID] = $sessionId;
        }
        if (!is_null($sessionData)) {
            $result['session'] = $sessionData;
        }
        $result['uri']['path'] = $url;

        return $result;
    }

}
