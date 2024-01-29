<?php

declare(strict_types=1);

namespace Phphleb\Tests;

class SwooleHttpServerRequest
{
    public function __construct(
        public readonly int $fd,
        public readonly int $streamId,
        public readonly array $header,
        public readonly array $server,
        public readonly array $cookie,
        public readonly array $get,
        public readonly array $files,
        public readonly array $post,
        public readonly array $tmpfiles,

        private readonly string|false $rewContent,
        private readonly string|false $data,
        private readonly bool $isCompleted,
        private readonly string|false $method,
    )
    {
    }

    public function __destruct()
    {
    }

    /**
     * Возвращает содержимое запроса, аналогично вызова функции fopen('php://input').
     * Возвращает false при возникновении ошибки.
     * @alias Этот метод дублирует \Swoole\Http\Request::rawContent().
     *
     * @see \Swoole\Http\Request::rawContent()
     * @since 4.5.0
     */
    public function getContent(): string|false
    {
        return $this->rewContent;
    }

    /**
     * Возвращает содержимое запроса, аналогично вызова функции fopen('php://input').
     * Возвращает false при возникновении ошибки.
     * @alias Этот метод дублирует \Swoole\Http\Request::getContent().
     *
     * @see \Swoole\Http\Request::rawContent()
     */
    public function rawContent(): string|false
    {
        return $this->rewContent;
    }

    public function getData(): string|false
    {
        return $this->data;
    }

    /* public static function create(array $options = []):  Request
    {
    }*/

    /*public function parse(string $data): int|false
    {
    }*/

    public function isCompleted(): bool
    {
        return $this->isCompleted;
    }

    public function getMethod(): string|false
    {
        return $this->method;
    }
}
