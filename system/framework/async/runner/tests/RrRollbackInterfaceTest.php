<?php

declare(strict_types=1);

namespace Phphleb\directories\app\Controllers;

use Phphleb\TestO\TestCase;
use Phphleb\Tests\RoadRunnerInit;

/**
 * Тестирование работы фреймворка при сбросе состояния в асинхронном режиме.
 */
class RrRollbackInterfaceTest extends TestCase
{
    private RoadRunnerInit $frame;

    public function __construct()
    {
        require_once __DIR__ . '/../standard_autoloader.php';

        $this->frame = new RoadRunnerInit();
    }

    /**
     * Проверка было ли сброшено состояние в последующем запросе.
     */
    public function testAsyncSessionV1(): void
    {   
        $data = [
            $this->getWithLevel(1),
            $this->getWithLevel(2),
            $this->getWithLevel(3),
            ];
        
        $response = $this->frame->run($data);

        $commonBody = implode('|', $this->frame->handler($response, 'body'));
        $isCode200 = $this->frame->checkCode200($response);

        $valid = 'SUCCESS-ROLLBACK:1-DATA[0,1]|SUCCESS-ROLLBACK:2-DATA[0,2]|SUCCESS-ROLLBACK:3-DATA[0,3]';

        $originBody = $commonBody === $valid;

        $this->frame->checkErrors($response);   
        $result = $originBody && $isCode200;

        $this->assertTrue($result);
    }

    private function getWithLevel(int $level)
    {
        $result = $this->frame::DEFAULT_DATA;
        $result['uri']['path'] = '/test-rollback/controller/' . $level;

        return $result;
    }

}
