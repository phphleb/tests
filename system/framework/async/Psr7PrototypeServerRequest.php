<?php

namespace Phphleb\Tests;

final class Psr7PrototypeServerRequest
{
    public function __construct(
        private readonly Psr7PrototypeUriRequest $uri,
        private readonly array                   $cookieParams,
        private readonly null|array|object       $parsedBody,
        private readonly array                   $queryParams,
        private readonly array                   $uploadedFiles,
        private readonly string                  $method,
        private readonly array                   $headers,
    )
    {
    }

    /**
     * Возвращает список Сookies.
     *
     * Получает данные Сookies, отправленные клиентом на сервер.
     *
     * Данные ДОЛЖНЫ быть совместимы со структурой суперглобального массива $_COOKIE.
     */
    public function getCookieParams(): array
    {
        return $this->cookieParams;
    }

    /**
     * Возвращает любые параметры, указанные в теле запроса.
     *
     * Если Content-Type запроса имеет значение application/x-www-form-urlencoded
     * или multipart/form-data, и метод запроса POST, этот метод ДОЛЖЕН
     * вернуть содержимое $_POST.
     * В противном случае этот метод может вернуть любые результаты десериализации
     * массива или объекта. В случае отсутствия тела запроса - возвращает null.
     */
    public function getParsedBody(): null|array|object
    {
        return $this->parsedBody;
    }

    /**
     * Возвращает аргументы из строки запроса.
     *
     * Извлекает десериализованные аргументы строки запроса, если таковые имеются.
     *
     * Аналогично $_SERVER['QUERY_STRING'].
     */
    public function getQueryParams(): array
    {
        return $this->queryParams;
    }

    /**
     * Возвращает нормализованные данные загрузки файлов.
     *
     * Аналогично $_FILES.
     */
    public function getUploadedFiles(): array
    {
        return $this->uploadedFiles;
    }

    /**
     * Возвращает HTTP-метод запроса.
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * Возвращает все значения заголовков сообщений.
     *
     * Ключи массива представляют собой имя заголовка, которое было отправлено по сети, и
     * соответствующее значение представляет собой массив строк, связанных с этим заголовком.
     *
     * @return string[][]
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * Возвращает объектное представление URI-запроса.
     *
     * @link http://tools.ietf.org/html/rfc3986#section-4.3
     */
    public function getUri(): Psr7PrototypeUriRequest
    {
        return $this->uri;
    }

}