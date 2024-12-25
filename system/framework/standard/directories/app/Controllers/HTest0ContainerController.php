<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Bootstrap\Services\AuthowireTest2;
use App\Bootstrap\Services\AuthowireTest3;
use App\Bootstrap\Services\AuthowireTest4;
use App\Bootstrap\Services\AuthowireTest5;
use App\Bootstrap\Services\AutowireTestInterface;
use App\Commands\ContainerTestTask;
use App\Models\TestModel;
use Hleb\Base\Controller;
use Hleb\Constructor\Attributes\Autowiring\DI;
use Hleb\Constructor\Data\View;
use Hleb\Reference\ArrInterface;
use Hleb\Reference\CacheInterface;
use Hleb\Reference\CsrfInterface;
use Hleb\Reference\DbInterface;
use Hleb\Reference\DebugInterface;
use Hleb\Reference\DtoInterface;
use Hleb\Reference\CookieInterface;
use Hleb\Reference\Interface\Arr;
use Hleb\Reference\Interface\Cache;
use Hleb\Reference\Interface\Cookie;
use Hleb\Reference\Interface\Csrf;
use Hleb\Reference\Interface\Db;
use Hleb\Reference\Interface\Debug;
use Hleb\Reference\Interface\Dto;
use Hleb\Reference\Interface\Log;
use Hleb\Reference\Interface\Path;
use Hleb\Reference\Interface\Redirect;
use Hleb\Reference\Interface\Request;
use Hleb\Reference\Interface\Response;
use Hleb\Reference\Interface\Router;
use Hleb\Reference\Interface\Session;
use Hleb\Reference\Interface\Setting;
use Hleb\Reference\Interface\System;
use Hleb\Reference\Interface\Template;
use Hleb\Reference\LogInterface;
use Hleb\Reference\PathInterface;
use Hleb\Reference\RedirectInterface;
use Hleb\Reference\RequestInterface;
use Hleb\Reference\ResponseInterface;
use Hleb\Reference\RouterInterface;
use Hleb\Reference\SessionInterface;
use Hleb\Reference\SettingInterface;
use Hleb\Reference\SystemInterface;
use Hleb\Reference\TemplateInterface;
use Hleb\Static\Command;

class HTest0ContainerController extends Controller
{
    /**
     * Проверка метода контейнера.
     */
    public function actionRequest1(): array
    {
        return [
            'type' => $this->request()->param('type')->asString(),
            'num' => $this->request()->param('num')->asInt(),
        ];
    }

    public function actionRequest2(): array
    {
        return [
            'type' => $this->container->request()->param('type')->asString(),
            'num' => $this->container->request()->param('num')->asInt(),
        ];
    }

    public function actionRequest3(): array
    {
        return [
            'type' => $this->container->get(RequestInterface::class)->param('type')->asString(),
            'num' => $this->container->get(RequestInterface::class)->param('num')->asInt(),
        ];
    }

    public function actionCookies1(): array
    {
        $cookie = $this->cookies();
        return [
            'test-value' => $cookie->get('test')->asString(),
            'session-name' => $cookie->getSessionName(),
            'session-id' => $cookie->getSessionId(),
        ];
    }

    public function actionCookies2(): array
    {
        $cookie = $this->container->cookies();
        return [
            'test-value' => $cookie->get('test')->asString(),
            'session-name' => $cookie->getSessionName(),
            'session-id' => $cookie->getSessionId(),
        ];
    }

    public function actionCookies3(): array
    {
        $cookie = $this->container->get(CookieInterface::class);
        return [
            'test-value' => $cookie->get('test')->asString(),
            'session-name' => $cookie->getSessionName(),
            'session-id' => $cookie->getSessionId(),
        ];
    }

    public function actionRoute1(): array
    {
        $route = $this->router();
        return [
            'url' => $route->url('Route-name'),
            'name' => $route->name(),
        ];
    }

    public function actionRoute2(): array
    {
        $route = $this->container->route();
        return [
            'url' => $route->url('Route-name'),
            'name' => $route->name(),
        ];
    }

    public function actionRoute3(): array
    {
        $route = $this->container->get(RouterInterface::class);
        return [
            'url' => $route->url('Route-name'),
            'name' => $route->name(),
        ];
    }

    public function actionResponse1(): array
    {
        $response = $this->response();
        $response->setStatus(100);
        $response->setBody('BODY-TEST');
        $body = $response->getBody();
        $response->clearBody();
        return [
            'status' => $response->getStatus(),
            'body' => $body,
        ];
    }

    public function actionResponse2(): array
    {
        $response = $this->container->response();
        $response->setStatus(1002);
        $response->setBody('BODY-TEST');
        $body = $response->getBody();
        $response->clearBody();
        return [
            'status' => $response->getStatus(),
            'body' => $body,
        ];
    }

    public function actionResponse3(): array
    {
        $response = $this->container->get(ResponseInterface::class);
        $response->setStatus(1003);
        $response->setBody('BODY-TEST');
        $body = $response->getBody();
        $response->clearBody();
        return [
            'status' => $response->getStatus(),
            'body' => $body,
        ];
    }

    public function actionDto1(): array
    {
        $dto = $this->container->dto();
        $dto->set('test', 1000);
        return [
            'value' => $dto->get('test'),
        ];
    }

    public function actionDto2(): array
    {
        $dto = $this->container->get(DtoInterface::class);
        $dto->set('test', 1002);
        return [
            'value' => $dto->get('test'),
        ];
    }

    public function actionCache1(): array
    {
        $cache = $this->container->cache();
        return [
            'empty_key' => $cache->has('test'),
        ];
    }

    public function actionCache2(): array
    {
        $cache = $this->container->get(CacheInterface::class);
        return [
            'empty_key' => $cache->has('test'),
        ];
    }

    public function actionLog1(): array
    {
        $log = $this->container->log();
        return [
            'empty_log' => $log->debug('Test'),
        ];
    }

    public function actionLog2(): array
    {
        $log = $this->container->get(LogInterface::class);
        return [
            'empty_log' => $log->debug('Test'),
        ];
    }

    public function actionDb1(): array
    {
        $container = $this->container;
        return [
            'has_method' => method_exists($container, 'db'),
        ];
    }

    public function actionDebug1(): array
    {
        $container = $this->container;
        return [
            'has_method' => method_exists($container, 'debug'),
        ];
    }

    public function actionTemplate1(): View
    {
        return view('container/view');
    }

    public function actionModel1(): array
    {
        return TestModel::getStaticData();
    }

    public function actionModel2(): array
    {
        return (new TestModel())->getData();
    }

    public function actionTask1(): array
    {
        $task = new ContainerTestTask($this->config);
        $task->call();

        return $task->getExecResult();
    }

    public function actionTask2(): array
    {
        $task = new ContainerTestTask($this->config);

        return $this->container->command()->execute($task);
    }

    public function actionTask3(): array
    {
        $task = new ContainerTestTask($this->config);

        return Command::execute($task);
    }

    public function actionArr100(): string
    {
       return (string)$this->checkItems([ArrInterface::class, Arr::class]);
    }

    public function actionCache100(): string
    {
        return (string)$this->checkItems([CacheInterface::class, Cache::class]);
    }

    public function actionCookie100(): string
    {
        return (string)$this->checkItems([CookieInterface::class, Cookie::class]);
    }

    public function actionCsrf100(): string
    {
        return (string)$this->checkItems([CsrfInterface::class, Csrf::class]);
    }

    public function actionDb100(): string
    {
        return (string)$this->checkItems([DbInterface::class, Db::class]);
    }

    public function actionDebug100(): string
    {
        return (string)$this->checkItems([DebugInterface::class, Debug::class]);
    }

    public function actionDto100(): string
    {
        return (string)$this->checkItems([DtoInterface::class, Dto::class]);
    }

    public function actionLog100(): string
    {
        return (string)$this->checkItems([LogInterface::class, Log::class]);
    }

    public function actionPath100(): string
    {
        return (string)$this->checkItems([PathInterface::class, Path::class]);
    }

    public function actionRequest100(): string
    {
        return (string)$this->checkItems([RequestInterface::class, Request::class]);
    }

    public function actionRedirect100(): string
    {
        return (string)$this->checkItems([RedirectInterface::class, Redirect::class]);
    }

    public function actionResponse100(): string
    {
        return (string)$this->checkItems([ResponseInterface::class, Response::class]);
    }

    public function actionSession100(): string
    {
        return (string)$this->checkItems([SessionInterface::class, Session::class]);
    }

    public function actionRoute100(): string
    {
        return (string)$this->checkItems([RouterInterface::class, Router::class]);
    }

    public function actionSetting100(): string
    {
        return (string)$this->checkItems([SettingInterface::class, Setting::class]);
    }

    public function actionSystem100(): string
    {
        return (string)$this->checkItems([SystemInterface::class, System::class]);
    }

    public function actionTemplate100(): string
    {
        return (string)$this->checkItems([TemplateInterface::class, Template::class]);
    }



    public function actionService001(): string
    {
        return (string)$this->checkItems([\DateTime::class, \DateTime::class]);
    }

    public function actionService002(): string
    {
        \App\Bootstrap\ContainerFactory::setSingleton(\DateTimeZone::class, new \DateTimeZone('Europe/Moscow'));

        return (string)$this->checkItems([\DateTimeZone::class, \DateTimeZone::class]);
    }

    public function actionService003(): string
    {
        \App\Bootstrap\ContainerFactory::setSingleton(\DateTimeInterface::class, new \DateTime());

        return \Hleb\Static\Container::has(\DateTimeInterface::class) ? '1' : '0';
    }

    public function actionService004(): string
    {
        \App\Bootstrap\ContainerFactory::setSingleton(\DateTimeInterface::class, new \DateTime());

        return (string)$this->checkItems([\DateTimeInterface::class, \DateTime::class]);
    }

    public function actionService005(): string
    {
        \App\Bootstrap\ContainerFactory::setSingleton(\DateInterval::class, function() {
            return \DateInterval::createFromDateString('1 day');
        });

        return (string)$this->checkItems([\DateInterval::class, \DateInterval::class]);
    }

    public function actionDiAutowire001(AutowireTestInterface $autowire, Setting $setting): string
    {
        return 'HL_AUTOWIRE_DI_' . $autowire->getTag() . '_MODE_' . $setting->getParam('system', 'autowiring.mode');
    }


    public function actionDiAutowire002(
        #[DI(AuthowireTest2::class)]
        AutowireTestInterface $autowire,
        Setting $setting
    ): string
    {
        return 'HL_AUTOWIRE_DI_' . $autowire->getTag() . '_MODE_' . $setting->getParam('system', 'autowiring.mode');
    }

    public function actionDiAutowire003(
        #[DI(AuthowireTest3::class)]
        AutowireTestInterface $autowire,
        Setting $setting
    ): string
    {
        return 'HL_AUTOWIRE_DI_' . $autowire->getTag() . '_MODE_' . $setting->getParam('system', 'autowiring.mode');
    }

    public function actionDiAutowire004(
        #[DI(AuthowireTest4::class)]
        AutowireTestInterface $autowire,
        Setting $setting
    ): string
    {
        return 'HL_AUTOWIRE_DI_' . $autowire->getTag() . '_MODE_' . $setting->getParam('system', 'autowiring.mode');
    }

    public function actionDiAutowire005(
        #[DI(AuthowireTest5::class)]
        AutowireTestInterface $autowire,
        Setting $setting
    ): string
    {
        return 'HL_AUTOWIRE_DI_' . $autowire->getTag() . '_MODE_' . $setting->getParam('system', 'autowiring.mode');
    }

    public function actionDiAutowire063(
        AuthowireTest3 $autowire,
        Setting $setting
    ): string
    {
        return 'HL_AUTOWIRE_DI_' . $autowire->getTag() . '_MODE_' . $setting->getParam('system', 'autowiring.mode');
    }

    public function actionDiAutowire064(
        AuthowireTest4 $autowire,
        Setting $setting
    ): string
    {
        return 'HL_AUTOWIRE_DI_' . $autowire->getTag() . '_MODE_' . $setting->getParam('system', 'autowiring.mode');
    }

    public function actionDiAutowire065(
        AuthowireTest5 $autowire,
        Setting $setting
    ): string
    {
        return 'HL_AUTOWIRE_DI_' . $autowire->getTag() . '_MODE_' . $setting->getParam('system', 'autowiring.mode');
    }

    public function checkItems(array $tags): bool
    {
        return $this->container->get($tags[0])::class === $this->container->get($tags[1])::class;
    }
}
