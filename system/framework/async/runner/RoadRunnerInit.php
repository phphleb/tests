<?php

declare(strict_types=1);

namespace Phphleb\Tests;

class RoadRunnerInit
{
    use BaseInitTrait;

    public const DEFAULT_DATA = [
        'uri' => [
            'host' => 'site.com',
            'path' => '/test/',
            'query' => 'test=100500',
            'scheme' => 'http',
            'port' => '8080',
        ],
        'cookie-params' => [self::SESSION_ID => self::SESSION_KEY],
        'parsed-body' => null,
        'query-params' => ['test' => 100500],
        'uploaded-files' => [],
        'method' => 'GET',
        'headers' => ['Content-Type' => 'text/html'],
        // Внешняя сессия.
        'session' => null,
        // Внешние COOKIES
        'cookies' => null,
    ];

    protected function createRequest(array $params): Psr7PrototypeServerRequest
    {
        return (new RoadRunnerRequestFabric($params))->create();
    }

    protected function getData(): array
    {
        return self::DEFAULT_DATA;
    }
}