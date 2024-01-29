<?php

namespace Phphleb\Tests;

/**
 * Создание объекта Request который имитирует подобный объект из Swoole.
 */
final class SwooleRequestFabric
{
    public function __construct(private readonly array $params)
    {
    }

    public function create(): SwooleHttpServerRequest
    {
        return new SwooleHttpServerRequest(
            $this->params['fd'],
            $this->params['streamId'],
            $this->params['header'],
            $this->params['server'],
            $this->params['cookie'],
            $this->params['get'],
            $this->params['files'],
            $this->params['post'],
            $this->params['tmpfiles'],
            $this->params['rewContent'],
            $this->params['data'],
            $this->params['isCompleted'],
            $this->params['method'],
        );
    }
}