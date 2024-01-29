<?php

namespace Phphleb\Tests;

/**
 * Создание объекта Request который имитирует подобный объект из RoadRunner.
 */
final class RoadRunnerRequestFabric
{
    public function __construct(private readonly array $params)
    {
    }

    public function create(): Psr7PrototypeServerRequest
    {
        $req = $this->params;
        $uri = $req['uri'];

        $uri = new Psr7PrototypeUriRequest($uri['host'], $uri['path'], $uri['query'], $uri['scheme'], $uri['port']);
        return new Psr7PrototypeServerRequest(
            $uri,
            $req['cookie-params'],
            $req['parsed-body'],
            $req['query-params'],
            $req['uploaded-files'],
            $req['method'],
            $req['headers'],
        );
    }
}