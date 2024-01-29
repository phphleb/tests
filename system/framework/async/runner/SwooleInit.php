<?php

declare(strict_types=1);

namespace Phphleb\Tests;

class SwooleInit
{
    use BaseInitTrait;

    public const DEFAULT_DATA = [
        'fd' => 1,
        'streamId' => 1000,
        'header' => ['Content-Type' => 'text/html'],
        'server' => [
            'request_method' => 'GET',
            'request_uri' => '/test/',
            'path_info' => '/test/',
            'server_protocol' => 'HTTP/1.1',
            'server_port' => 8080,
            'remote_port' => 8080,
            'remote_addr' => 'site.com',
            'query_string' => 'test=100500',
        ],
        'cookie' => [self::SESSION_ID => self::SESSION_KEY],
        'get' => ['test' => 100500],
        'files' => [],
        'post' => [],
        'tmpfiles' => [],
        'rewContent' => '',
        'data' => '',
        'isCompleted' => true,
        'method' => 'GET',
        // Внешняя сессия.
        'session' => null,
        // Внешние COOKIES
        'cookies' => null,
    ];

    protected function createRequest(array $params): SwooleHttpServerRequest
    {
        return (new SwooleRequestFabric($params))->create();
    }

    protected function getData(): array
    {
        return self::DEFAULT_DATA;
    }
}