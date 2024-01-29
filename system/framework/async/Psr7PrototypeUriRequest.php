<?php

namespace Phphleb\Tests;

final class Psr7PrototypeUriRequest
{
    public function __construct(
        private readonly string $host,
        private readonly string $path,
        private readonly string $query,
        private readonly string $scheme,
        private readonly int|null $port,
    )
    {
    }

    /**
     * Возвращает хост из URI-адреса в нижнем регистре
     * или пустую строку при отсутствии.
     */
    public function getHost(): string
    {
       return $this->host;
    }

    /**
     * Возвращает компонент пути для URI или пустую строку или '/' при отсутствии данных.
     */
    public function getPath(): string
    {
      return $this->path;
    }

    /**
     * Возвращает строку запроса URI или пустую строку при отсутствии.
     * Начальный символ '?' не должен добавляться к результату.
     */
    public function getQuery(): string
    {
      return $this->query;
    }

    /**
     * Возвращает компонент схемы URI или пустую строку при отсутствии.
     *
     * Возвращаемое значение ДОЛЖНО быть в нижнем регистре в соответствии с RFC 3986.
     */
    public function getScheme(): string
    {
       return $this->scheme;
    }

    /**
     * Возвращает компонент авторизации URI или пустую строку
     * при отсутствии авторизации.
     *
     * @see https://tools.ietf.org/html/rfc3986#section-3.2
     * @return string Имеет вид авторизации формата "[user-info@]host[:port]".
     */
    public function getAuthority(): string
    {
       return '';
    }

    /**
     * Возвращает порт из URI-адреса или null при его отсутствии.
     */
    public function getPort(): null|int
    {
       return $this->port;
    }
}