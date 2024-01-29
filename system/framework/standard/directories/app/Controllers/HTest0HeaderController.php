<?php

declare(strict_types=1);

namespace App\Controllers;

use Hleb\Base\Controller;
use Hleb\Static\Response;
use Hleb\HttpMethods\External\Response as SystemResponse;
use Hleb\Static\Response as StaticResponse;

class HTest0HeaderController extends Controller
{
    public function status200(): bool
    {
        return true;
    }

    public function status419v1(): bool
    {
        header('HTTP/1.1 419 Authentication Timeout');

        return true;
    }

    public function status419v2(): bool
    {
        Response::replaceHeaders(['HTTP/1.1 419 Authentication Timeout']);

        return true;
    }

    public function status419response1(): SystemResponse
    {
        StaticResponse::setStatus(500);

        return new SystemResponse(status: 419);
    }

    public function status419response2(SystemResponse $response): SystemResponse
    {
        $response->setStatus(419);

        StaticResponse::setStatus(500);

        return $this->response()->getInstance();
    }
}