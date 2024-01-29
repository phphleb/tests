<?php

declare(strict_types=1);

namespace App\Controllers;

use Hleb\Base\Controller;
use Hleb\HttpMethods\External\Response as SystemResponse;
use Hleb\Reference\Interface\Response;
use Hleb\Reference\ResponseInterface;
use Hleb\Static\Response as StaticResponse;

class HTest0ResponseController extends Controller
{
    public function action1(): SystemResponse
    {
        return new SystemResponse();
    }

    public function action2(): SystemResponse
    {
        return $this->response()->getInstance();
    }

    public function action3(): SystemResponse
    {
        return $this->container->response()->getInstance();
    }

    public function action4(Response $response): Response
    {
        return $response;
    }

    public function action5(): SystemResponse
    {
        return new SystemResponse('TEST_5');
    }

    public function action6(): SystemResponse
    {
        $this->response()->setBody('INIT');

        $response = $this->response()->getInstance();

        $response->addToBody('_TEST_6');

        return $response;
    }

    public function action7(): SystemResponse
    {
        $this->response()->setBody('INIT');

        return new SystemResponse('TEST_7');
    }

    public function action8(SystemResponse $response): SystemResponse
    {
        $this->response()->setBody('INIT');

        $response->addToBody('TEST_8');

        return $response;
    }

    public function action9(): SystemResponse
    {
        $this->response()->setBody('INIT');

        $response = $this->response()->getInstance();

        $this->response()->addToBody('_');

        $response->addToBody('TEST_9');

        return $response;
    }

    public function action10(): ResponseInterface
    {
        $this->response()->setBody('INIT');

        $this->response()->addToBody('_TEST_10');

        return $this->response();
    }

    public function action11(): Response
    {
        $this->response()->setBody('INIT');

        $this->response()->addToBody('_TEST_11');

        return $this->response();
    }

    public function action12(): Response
    {
        $this->response()->setBody('INIT');

        $this->response()->addToBody('_TEST_12');

        $this->response()->setStatus(500);

        return $this->response();
    }

    public function action13(SystemResponse $response): SystemResponse
    {
        StaticResponse::setBody('INIT');

        $response->addToBody('TEST_13');

        return $response;
    }

    public function action14(): Response
    {
        StaticResponse::setBody('INIT');

        $this->response()->addToBody('_TEST');

        StaticResponse::addToBody('_14');

        return $this->response();
    }

    public function action15(): Response
    {
        StaticResponse::set('INIT');

        $this->response()->add('_TEST');

        StaticResponse::add('_15');

        return $this->response();
    }

    public function action16(): Response
    {
        StaticResponse::set('INIT_TEST');

        $body = $this->response()->get();

        StaticResponse::set($body . '_16');

        return $this->response();
    }

    public function action17(): void
    {
        StaticResponse::set('INIT_TEST_17');
    }
}