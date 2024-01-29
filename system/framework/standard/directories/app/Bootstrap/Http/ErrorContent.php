<?php

declare(strict_types=1);

namespace App\Bootstrap\Http;

use Hleb\Constructor\Attributes\Dependency;
use \App\Bootstrap\ContainerInterface;

/**
 * Implements content management of returned HTTP errors.
 *
 * Реализует управление контентом возвращаемых HTTP-ошибок.
 */
#[Dependency]
readonly final class ErrorContent
{
    /**
     * @param int $httpCode - error code, for example 404.
     *                      - код ошибки, например 404.
     *
     * @param string $defaultMessage - error message, for example 'Not Found'.
     *                               - сообщение об ошибке, например 'Not Found'.
     *
     * @param ContainerInterface $container - container for receiving additional data.
     *                                      - контейнер для получения дополнительных данных.
     */
    public function __construct(
        private int    $httpCode,
        private string $defaultMessage,
        private ContainerInterface $container,
    )
    {
    }

    /**
     * Returns the content for the GET method.
     *
     * Возвращает контент для метода 'GET'.
     */
    public function get(): string
    {
        $apiVersion = $this->container->system()->getFrameworkApiVersion();
        $uriPrefix = $this->container->system()->getFrameworkResourcePrefix();

        return '<!DOCTYPE html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width" />
        <meta name="robots" content="noindex, noarchive" />
        <link rel="stylesheet" href="/' . $uriPrefix . '/framework/v' . $apiVersion . '/css/error">
        <title>' . $this->httpCode . '. ' . $this->defaultMessage . '</title>
    </head>
    <body>
        <div class="hl-error-page-content">
            <h1 class="hl-error-page-message">
                <span class="hl-error-page-code">' . $this->httpCode . '</span>
                ' . $this->defaultMessage . '
             </h1>
        </div>
    </body>
</html>';
    }

    /**
     * Returns content for 'POST', 'PUT', 'PATCH', 'DELETE' methods.
     *
     * Возвращает контент для 'POST', 'PUT', 'PATCH', 'DELETE' методов.
     *
     * @throws \JsonException
     */
    public function other(): string
    {
        return (string)\json_encode([
            'error' => [
                'code' => $this->httpCode,
                'message' => $this->defaultMessage
            ]
        ], JSON_THROW_ON_ERROR);
    }

}