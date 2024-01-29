<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

/**
 * Тестирование работы фреймворка с cookies в асинхронном режиме.
 */
class RrBaseCookiesTest extends TestCase
{
    private RoadRunnerInit $frame;

    public function __construct()
    {
        require_once __DIR__ . '/../standard_autoloader.php';

        $this->frame = new RoadRunnerInit();
    }

    public function testAsyncCookiesV1(): void
    {   
        $data = [
            $this->getWithCookies(['test' => 'value']),
            $this->getWithCookies([]),
            $this->getWithCookies(null),
            ];
        
        $response = $this->frame->run($data);

        $commonBody = implode('|', $this->frame->handler($response, 'body'));
        $isCode200 = $this->frame->checkCode200($response);
        $originSession = json_encode([['test-cookies' => 'value'], ['test-cookies' => null], ['test-cookies' => null]]);
        $isSessionData = $originSession === json_encode($this->frame->handler($response, 'session'));
        $originBody = $commonBody === $this->frame->getRepeatVal('EXT-COOKIES-SUCCESS', 3);

        $this->frame->checkErrors($response);
        $result = $originBody && $isCode200 && $isSessionData;

        $this->assertTrue($result);
    }

    private function getWithCookies(?array $cookieData = null)
    {
        $result = $this->frame::DEFAULT_DATA;
        if (!is_null($cookieData)) {
            $result['cookies'] = $cookieData;
        }
        $result['session'] = [];
        $result['uri']['path'] = '/test-cookies/controller';

        return $result;
    }

}