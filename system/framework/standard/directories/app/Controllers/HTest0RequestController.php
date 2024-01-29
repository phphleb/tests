<?php

declare(strict_types=1);

namespace App\Controllers;

use Hleb\Base\Controller;
use Hleb\Static\Request;
use Hleb\Static\Session;

class HTest0RequestController extends Controller
{
   public function getRequestList(): array
   {
       $req = $this->request();
       $session = $this->container->session();

       return [
           'get.value' => $req->get('get-test')->value(),
           'test.data.value' => isset($req->data()['test']) ? $req->data()['test'] : null,
           'rawData' => $req->rawData(),
           'post.value' => $req->post('post-test')?->value,
           'input.value' => $req->input()['post-test'] ?? null,
           'test.param.value' => $req->param('test')?->value(),
           'getMethod' => $req->getMethod(),
           'isGetMethod' => $req->isMethod('GET'),
           'session.value' => $session->get('session.value'),
           'session.data.value' => $session->get('session.value'),
           'getParsedBody' => $req->getParsedBody(),
           'getRawBody' => $req->getRawBody(),
           'getUrigetPath' => $req->getUri()->getPath(),
           'getUrigetHost' => $req->getUri()->getHost(),
           'getUrigetIp' => $req->getUri()->getIp(),
           'getUrigetQuery' => $req->getUri()->getQuery(),
           'getUrigetPort' => $req->getUri()->getPort(),
           'getUrigetScheme' => $req->getUri()->getScheme(),
           'isAjax' => $req->isAjax(),
           'getFiles' => $req->getFiles(),
           'getHost' => $req->getHost(),
           'getAddress' => $req->getAddress(),
           'getHttpScheme' => $req->getHttpScheme(),
           'getSchemeAndHost' => $req->getSchemeAndHost(),
       ];
   }

    public function getRequestStatic(): array
    {
        return [
            'get.value' => Request::get('get-test')->value,
            'test.data.value' => isset(Request::data()['test']) ? Request::data()['test'] : null,
            'rawData' => Request::rawData(),
            'post.value' => Request::post('post-test')?->value,
            'input.value' => Request::input()['post-test'] ?? null,
            'test.param.value' => Request::param('test')?->value,
            'getMethod' => Request::getMethod(),
            'isGetMethod' => Request::isMethod('GET'),
            'session.value' => Session::get('session.value'),
            'session.data.value' => Session::get('session.value'),
            'getParsedBody' => Request::getParsedBody(),
            'getRawBody' => Request::getRawBody(),
            'getUrigetPath' => Request::getUri()->getPath(),
            'getUrigetHost' => Request::getUri()->getHost(),
            'getUrigetIp' => Request::getUri()->getIp(),
            'getUrigetQuery' => Request::getUri()->getQuery(),
            'getUrigetPort' => Request::getUri()->getPort(),
            'getUrigetScheme' => Request::getUri()->getScheme(),
            'isAjax' => Request::isAjax(),
            'getFiles' => Request::getFiles(),
            'getHost' => Request::getHost(),
            'getAddress' => Request::getAddress(),
            'getHttpScheme' => Request::getHttpScheme(),
            'getSchemeAndHost' => Request::getSchemeAndHost(),
        ];
    }

    public function getServer(): void
    {
        $param = Request::param('name')->value;
        $param = str_replace('-', '_', $param);
        echo Request::server(strtoupper($param));
    }

    public function getParam1(): array
    {
        return Request::get('name')->asArray();
    }

    public function getParam2(): array
    {
        return Request::get('name')->value();
    }

    public function getParam3(): array
    {
        return Request::post('name')->asArray();
    }

    public function getParam4(): array
    {
        return Request::post('name')->value();
    }

}