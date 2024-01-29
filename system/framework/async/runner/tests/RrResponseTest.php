<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

/**
 * Проверка Response.
 */
class RrResponseTest extends TestCase
{
    private RoadRunnerInit $frame;

    public function __construct()
    {
        require_once __DIR__ . '/../standard_autoloader.php';

        $this->frame = new RoadRunnerInit();
    }

    public function testResponseV1(): void
    {
        $data = $this->frame::DEFAULT_DATA;
        $data['uri']['path'] = '/example-subsequence/controller/1';
        $commandResult = $this->frame->run([$data]);
        $result = $this->getContent($commandResult) === '_TEXT-1__TEXT-2__TEXT-3__TEXT-4__TEXT-5_';

        $this->assertTrue($result);
    }

    public function testResponseV2(): void
    {
        $data = $this->frame::DEFAULT_DATA;
        $data['uri']['path'] = '/example-subsequence/controller/2';
        $commandResult = $this->frame->run([$data]);
        $result = $this->getContent($commandResult) === '_TEXT-1__TEXT-2_';

        $this->assertTrue($result);
    }

    public function testResponseV3(): void
    {
        $data = $this->frame::DEFAULT_DATA;
        $data['uri']['path'] = '/example-subsequence/controller/3';
        $commandResult = $this->frame->run([$data]);
        $result = $this->getContent($commandResult) === '_TEXT-1__TEXT-2__TEXT-3__TEXT-4_';

        $this->assertTrue($result);
    }

    public function testResponseV4(): void
    {
        $data = $this->frame::DEFAULT_DATA;
        $data['uri']['path'] = '/example-subsequence/controller/4';
        $commandResult = $this->frame->run([$data]);
        $result = $this->getContent($commandResult) === '_TEXT-1__TEXT-2__TEXT-3__TEXT-4_VIEW-RESPONSE';

        $this->assertTrue($result);
    }

    /**
     * Выполнение всех проверок в цикле.
     */
    public function testResponseV5(): void
    {
        $data = $this->frame::DEFAULT_DATA;
        $query = [];
        for ($i = 1; $i < 5; $i++) {
            $data['uri']['path'] = "/example-subsequence/controller/$i";
            $query[] = $data;
        }
        $commandResult = $this->frame->run($query);
        $result1 = $this->getContent($commandResult, 'body', 0) === '_TEXT-1__TEXT-2__TEXT-3__TEXT-4__TEXT-5_';
        $result2 = $this->getContent($commandResult, 'body', 1) === '_TEXT-1__TEXT-2_';
        $result3 = $this->getContent($commandResult, 'body', 2) === '_TEXT-1__TEXT-2__TEXT-3__TEXT-4_';
        $result4 = $this->getContent($commandResult, 'body', 3) === '_TEXT-1__TEXT-2__TEXT-3__TEXT-4_VIEW-RESPONSE';
        $result5 = $this->getContent($commandResult, 'body', 0) === '_TEXT-1__TEXT-2__TEXT-3__TEXT-4__TEXT-5_';

        $this->assertTrue($result1 && $result2 && $result3 && $result4 && $result5);
    }

    private function getContent($result, ?string $value = null, int $position = 0): mixed
    {
        $list =  json_decode((string)$result ?: '[]', true);
        return $value ? $list[$position][$value] ?? null : $list[$position]['body'] ?? null;
    }
}