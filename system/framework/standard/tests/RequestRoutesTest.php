<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

/**
 * Проверка данных Request.
 */
class RequestRoutesTest extends TestCase
{
    private const DEFAULT_DATA = [
        'get.value' => 'GET-VALUE',
        'test.data.value' => null,
        'rawData' => [],
        'post.value' => null,
        'input.value' => null,
        'test.param.value' => null,
        'getMethod' => 'GET',
        'isGetMethod' => true,
        'session.value' => null,
        'session.data.value' => null,
        'getParsedBody' => [],
        'getRawBody' => '',
        'getUrigetPath' => '/test-request/controller/get',
        'getUrigetHost' => 'site.com',
        'getUrigetIp' => '',
        'getUrigetQuery' => '?get-test=GET-VALUE',
        'getUrigetPort' => null,
        'getUrigetScheme' => 'http',
        'isAjax' => false,
        'getFiles' => [],
        'getHost' => 'site.com',
        'getAddress' => 'http://' . 'site.com/test-request/controller/get',
        'getHttpScheme' => 'http://',
        'getSchemeAndHost' => 'http://' . 'site.com',
    ];

    private StandardInit $framework;

    public function __construct()
    {
        require_once __DIR__ . '/../standard_autoloader.php';

        $this->framework = new StandardInit();
    }

    public function testRequestRouteV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-request/controller/get?get-test=GET-VALUE';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $params['GET'] = ['get-test' => 'GET-VALUE'];
        $commandResult = (array)json_decode($this->framework->run($params), true);

        $this->assertArrayEquals($commandResult, self::DEFAULT_DATA);
    }

    public function testRequestRouteV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-request/controller/post?get-test=GET-VALUE';
        $params['SERVER']['REQUEST_METHOD'] = 'POST';
        $params['SERVER']['HTTP_HOST'] = 'site.com:8080';
        $params['GET'] = ['get-test' => 'GET-VALUE'];
        $params['POST'] = ['post-test' => 'POST-VALUE'];
        $commandResult = (array)json_decode($this->framework->run($params), true);
        $data = self::DEFAULT_DATA;
        $data['post.value'] = 'POST-VALUE';
        $data['input.value'] = 'POST-VALUE';
        $data['getUrigetHost'] = 'site.com:8080';
        $data['getMethod'] = 'POST';
        $data['getUrigetPort'] = 8080;
        $data['isGetMethod'] = false;
        $data['getUrigetPath'] = '/test-request/controller/post';
        $data['getHost'] = 'site.com:8080';
        $data['getAddress'] = 'http://' . 'site.com:8080/test-request/controller/post';
        $data['getParsedBody'] = ['post-test' => 'POST-VALUE'];
        $data['getHttpScheme'] = 'http://';
        $data['getSchemeAndHost'] = 'http://site.com:8080';

        $this->assertArrayEquals($commandResult, $data);
    }

    public function testRequestRouteV3(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-request/controller/post?get-test=GET-VALUE';
        $params['SERVER']['REQUEST_METHOD'] = 'POST';
        $params['SERVER']['HTTP_X_REQUESTED_WITH'] = 'XmlHttpRequest';
        $params['GET'] = ['get-test' => 'GET-VALUE'];
        $params['POST'] = ['post-test' => 'POST-VALUE'];
        $params['SESSION']['session.value'] = 'SESSION-VALUE';
        $commandResult = (array)json_decode($this->framework->run($params), true);

        $data = self::DEFAULT_DATA;
        $data['post.value'] = 'POST-VALUE';
        $data['input.value'] = 'POST-VALUE';
        $data['getMethod'] = 'POST';
        $data['isGetMethod'] = false;
        $data['session.value'] = 'SESSION-VALUE';
        $data['session.data.value'] = 'SESSION-VALUE';
        $data['getUrigetPath'] = '/test-request/controller/post';
        $data['isAjax'] = true;
        $data['getHost'] = 'site.com';
        $data['getAddress'] = 'http://' . 'site.com/test-request/controller/post';
        $data['getParsedBody'] = ['post-test' => 'POST-VALUE'];

        $this->assertArrayEquals($commandResult, $data);
    }

    public function testStaticRequestRouteV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-request-static/controller/get?get-test=GET-VALUE';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $params['GET'] = ['get-test' => 'GET-VALUE'];
        $commandResult = (array)json_decode($this->framework->run($params), true);

        $data = self::DEFAULT_DATA;
        $data['getUrigetPath'] = '/test-request-static/controller/get';
        $data['getAddress'] = 'http://' . 'site.com/test-request-static/controller/get';

        $this->assertArrayEquals($commandResult, $data);
    }

    public function testStaticRequestRouteV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-request-static/controller/post?get-test=GET-VALUE';
        $params['SERVER']['REQUEST_METHOD'] = 'POST';
        $params['SERVER']['HTTP_HOST'] = 'site.com:8080';
        $params['GET'] = ['get-test' => 'GET-VALUE'];
        $params['POST'] = ['post-test' => 'POST-VALUE'];
        $commandResult = (array)json_decode($this->framework->run($params), true);

        $data = self::DEFAULT_DATA;
        $data['post.value'] = 'POST-VALUE';
        $data['input.value'] = 'POST-VALUE';
        $data['getUrigetHost'] = 'site.com:8080';
        $data['getMethod'] = 'POST';
        $data['getUrigetPort'] = 8080;
        $data['isGetMethod'] = false;
        $data['getUrigetPath'] = '/test-request-static/controller/post';
        $data['getHost'] = 'site.com:8080';
        $data['getAddress'] = 'http://' . 'site.com:8080/test-request-static/controller/post';
        $data['getParsedBody'] = ['post-test' => 'POST-VALUE'];
        $data['getHttpScheme'] = 'http://';
        $data['getSchemeAndHost'] = 'http://site.com:8080';

        $this->assertArrayEquals($commandResult, $data);
    }

    public function testStaticRequestRouteV3(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-request-static/controller/post?get-test=GET-VALUE';
        $params['SERVER']['REQUEST_METHOD'] = 'POST';
        $params['SERVER']['HTTP_X_REQUESTED_WITH'] = 'XmlHttpRequest';
        $params['GET'] = ['get-test' => 'GET-VALUE'];
        $params['POST'] = ['post-test' => 'POST-VALUE'];
        $params['SESSION']['session.value'] = 'SESSION-VALUE';
        $commandResult = (array)json_decode($this->framework->run($params), true);
        $data = self::DEFAULT_DATA;
        $data['post.value'] = 'POST-VALUE';
        $data['input.value'] = 'POST-VALUE';
        $data['getMethod'] = 'POST';
        $data['isGetMethod'] = false;
        $data['session.value'] = 'SESSION-VALUE';
        $data['session.data.value'] = 'SESSION-VALUE';
        $data['getUrigetPath'] = '/test-request-static/controller/post';
        $data['isAjax'] = true;
        $data['getParsedBody'] = ['post-test' => 'POST-VALUE'];
        $data['getAddress'] = 'http://' . 'site.com/test-request-static/controller/post';
        $data['getHttpScheme'] = 'http://';
        $data['getSchemeAndHost'] = 'http://' . 'site.com';

        $this->assertArrayEquals($commandResult, $data);
    }

    public function testStaticRequestServerV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-request-static/method/http-x-requested-with';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $params['SERVER']['HTTP_X_REQUESTED_WITH'] = 'XmlHttpRequest';
        $commandResult = $this->framework->run($params);

        $this->assertTrue($commandResult === $params['SERVER']['HTTP_X_REQUESTED_WITH']);
    }

    public function testStaticRequestGetV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-request-static/array-param/1';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $params['GET'] = ['name' => ['key' => 'value']];
        $params['SERVER']['HTTP_X_REQUESTED_WITH'] = 'XmlHttpRequest';
        $commandResult = (array)json_decode($this->framework->run($params), true);
        $result = ['key' => 'value'];

        $this->assertArrayEquals($result, $commandResult);
    }

    public function testStaticRequestGetV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-request-static/array-param/2';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $params['GET'] = ['name' => ['key' => 'value']];
        $commandResult = (array)json_decode($this->framework->run($params), true);
        $result = ['key' => 'value'];

        $this->assertArrayEquals($result, $commandResult);
    }

    public function testStaticRequestPostV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-request-static/array-param/3';
        $params['SERVER']['REQUEST_METHOD'] = 'POST';
        $params['POST'] = ['name' => ['key' => 'value']];
        $commandResult = (array)json_decode($this->framework->run($params), true);
        $result = ['key' => 'value'];

        $this->assertArrayEquals($result, $commandResult);
    }

    public function testStaticRequestPostV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-request-static/array-param/4';
        $params['SERVER']['REQUEST_METHOD'] = 'POST';
        $params['POST'] = ['name' => ['key' => 'value']];
        $commandResult = (array)json_decode($this->framework->run($params), true);
        $result = ['key' => 'value'];

        $this->assertArrayEquals($result, $commandResult);
    }
}
