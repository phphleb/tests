<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

/**
 * Проверка работы специальных DI атрибутов фреймворка.
 */
class AutowiringTest extends TestCase
{
    private StandardInit $framework;

    public function __construct()
    {
        require_once __DIR__ . '/../standard_autoloader.php';

        $this->framework = new StandardInit();
    }

    /**
     * Стандартный запрос без атрибута DI.
     * autowiring.mode = null (по умолчанию)
     */
    public function testDIAutowiringV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/di-autowire/001';

        $this->assertEquals($this->framework->run($params), 'HL_AUTOWIRE_DI_1_MODE_');
    }

    /**
     * Стандартный запрос без атрибута DI.
     * autowiring.mode = 0
     */
    public function testDIAutowiringV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $config = $this->framework::DEFAULT_CONFIG;

        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/di-autowire/001';
        $config['system']['autowiring.mode'] = 0;

        $this->assertEquals($this->framework->run($params, $config), 'HL_AUTOWIRE_DI_1_MODE_0');
    }

    /**
     * Стандартный запрос без атрибута DI.
     * autowiring.mode = 1
     */
    public function testDIAutowiringV3(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $config = $this->framework::DEFAULT_CONFIG;

        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/di-autowire/001';
        $config['system']['autowiring.mode'] = 1;

        $this->assertEquals($this->framework->run($params, $config), 'HL_AUTOWIRE_DI_1_MODE_1');
    }

    /**
     * Стандартный запрос без атрибута DI.
     * autowiring.mode = 2
     */
    public function testDIAutowiringV4(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $config = $this->framework::DEFAULT_CONFIG;

        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/di-autowire/001';
        $config['system']['autowiring.mode'] = 2;

        $this->assertEquals($this->framework->run($params, $config), 'HL_AUTOWIRE_DI_1_MODE_2');
    }

    /**
     * Стандартный запрос без атрибута DI.
     * autowiring.mode = 3
     */
    public function testDIAutowiringV5(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $config = $this->framework::DEFAULT_CONFIG;

        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/di-autowire/001';
        $config['system']['autowiring.mode'] = 3;

        $this->assertEquals($this->framework->run($params, $config), 'HL_AUTOWIRE_DI_1_MODE_3');
    }

    /**
     * Запрос с атрибутом указывающим на класс из контейнера.
     * autowiring.mode = null (по умолчанию)
     */
    public function testDIAutowiringV6(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/di-autowire/002';

        $this->assertEquals($this->framework->run($params), 'HL_AUTOWIRE_DI_2_MODE_');
    }

    /**
     * Запрос с атрибутом указывающим на класс из контейнера.
     * autowiring.mode = 0
     */
    public function testDIAutowiringV7(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $config = $this->framework::DEFAULT_CONFIG;

        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/di-autowire/002';
        $config['system']['autowiring.mode'] = 0;

        $this->assertEquals($this->framework->run($params, $config), 'HL_AUTOWIRE_DI_2_MODE_0');
    }

    /**
     * Запрос с атрибутом указывающим на класс из контейнера.
     * autowiring.mode = 1
     */
    public function testDIAutowiringV8(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $config = $this->framework::DEFAULT_CONFIG;

        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/di-autowire/002';
        $config['system']['autowiring.mode'] = 1;

        $this->assertEquals($this->framework->run($params, $config), 'HL_AUTOWIRE_DI_2_MODE_1');
    }

    /**
     * Запрос с атрибутом указывающим на класс из контейнера.
     * autowiring.mode = 2
     */
    public function testDIAutowiringV9(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $config = $this->framework::DEFAULT_CONFIG;

        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/di-autowire/002';
        $config['system']['autowiring.mode'] = 2;

        $this->assertEquals($this->framework->run($params, $config), 'HL_AUTOWIRE_DI_2_MODE_2');
    }

    /**
     * Запрос с атрибутом указывающим на класс из контейнера.
     * autowiring.mode = 3
     */
    public function testDIAutowiringV10(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $config = $this->framework::DEFAULT_CONFIG;

        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/di-autowire/002';
        $config['system']['autowiring.mode'] = 3;

        $this->assertEquals($this->framework->run($params, $config), 'HL_AUTOWIRE_DI_2_MODE_3');
    }

    /**
     * Запрос с атрибутом указывающим на класс вне контейнера.
     * Непосредственный процесс автодополнения.
     * autowiring.mode = null (по умолчанию)
     */
    public function testDIAutowiringV11(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/di-autowire/003';

        $this->assertTrue($this->framework->run($params) === 'HL_AUTOWIRE_DI_3_MODE_');
    }

    /**
     * Запрос с атрибутом указывающим на класс вне контейнера.
     * Непосредственный процесс автодополнения.
     * autowiring.mode = 0
     */
    public function testDIAutowiringV12(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $config = $this->framework::DEFAULT_CONFIG;

        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/di-autowire/003';
        $config['system']['autowiring.mode'] = 0;

        $this->assertEquals($this->framework->run($params, $config), 'HL_AUTOWIRE_DI_3_MODE_0');
    }

    /**
     * Запрос с атрибутом указывающим на класс вне контейнера.
     * Непосредственный процесс автодополнения.
     * autowiring.mode = 1 (без автовайринга - ошибка)
     */
    public function testDIAutowiringV13(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $config = $this->framework::DEFAULT_CONFIG;

        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/di-autowire/003';
        $config['system']['autowiring.mode'] = 1;

        $this->assertFalse($this->framework->run($params, $config) === 'HL_AUTOWIRE_DI_3_MODE_1');
    }

    /**
     * Запрос с атрибутом указывающим на класс вне контейнера.
     * Непосредственный процесс автодополнения.
     * autowiring.mode = 2
     */
    public function testDIAutowiringV14(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $config = $this->framework::DEFAULT_CONFIG;

        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/di-autowire/003';
        $config['system']['autowiring.mode'] = 2;

        $this->assertEquals($this->framework->run($params, $config), 'HL_AUTOWIRE_DI_3_MODE_2');
    }

    /**
     * Запрос с атрибутом указывающим на класс вне контейнера.
     * Непосредственный процесс автодополнения.
     * autowiring.mode = 3 (без автовайринга и тега - ошибка)
     */
    public function testDIAutowiringV15(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $config = $this->framework::DEFAULT_CONFIG;

        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/di-autowire/003';
        $config['system']['autowiring.mode'] = 3;

        $this->assertFalse($this->framework->run($params, $config) === 'HL_AUTOWIRE_DI_3_MODE_3');
    }

    /**
     * Запрос с атрибутом указывающим на класс вне контейнера который имеет тег AllowAutowire.
     * Непосредственный процесс автодополнения.
     * autowiring.mode = null (по умолчанию)
     */
    public function testDIAutowiringV16(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/di-autowire/004';

        $this->assertTrue($this->framework->run($params) === 'HL_AUTOWIRE_DI_4_MODE_');
    }

    /**
     * Запрос с атрибутом указывающим на класс вне контейнера который имеет тег AllowAutowire.
     * Непосредственный процесс автодополнения.
     * autowiring.mode = 0
     */
    public function testDIAutowiringV17(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $config = $this->framework::DEFAULT_CONFIG;

        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/di-autowire/004';
        $config['system']['autowiring.mode'] = 0;

        $this->assertEquals($this->framework->run($params, $config), 'HL_AUTOWIRE_DI_4_MODE_0');
    }

    /**
     * Запрос с атрибутом указывающим на класс вне контейнера который имеет тег AllowAutowire.
     * Непосредственный процесс автодополнения.
     * autowiring.mode = 1 (без автовайринга - ошибка)
     */
    public function testDIAutowiringV18(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $config = $this->framework::DEFAULT_CONFIG;

        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/di-autowire/004';
        $config['system']['autowiring.mode'] = 1;

        $this->assertFalse($this->framework->run($params, $config) === 'HL_AUTOWIRE_DI_4_MODE_1');
    }

    /**
     * Запрос с атрибутом указывающим на класс вне контейнера который имеет тег AllowAutowire.
     * Непосредственный процесс автодополнения.
     * autowiring.mode = 2
     */
    public function testDIAutowiringV19(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $config = $this->framework::DEFAULT_CONFIG;

        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/di-autowire/004';
        $config['system']['autowiring.mode'] = 2;

        $this->assertEquals($this->framework->run($params, $config), 'HL_AUTOWIRE_DI_4_MODE_2');
    }

    /**
     * Запрос с атрибутом указывающим на класс вне контейнера который имеет тег AllowAutowire.
     * Непосредственный процесс автодополнения.
     * autowiring.mode = 3 (есть тег, поэтому ошибки нет)
     */
    public function testDIAutowiringV20(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $config = $this->framework::DEFAULT_CONFIG;

        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/di-autowire/004';
        $config['system']['autowiring.mode'] = 3;

        $this->assertEquals($this->framework->run($params, $config), 'HL_AUTOWIRE_DI_4_MODE_3');
    }

    /**
     * Запрос с атрибутом указывающим на класс вне контейнера который имеет тег NoAutowire.
     * Непосредственный процесс автодополнения.
     * autowiring.mode = null (по умолчанию)
     */
    public function testDIAutowiringV21(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/di-autowire/005';

        $this->assertTrue($this->framework->run($params) === 'HL_AUTOWIRE_DI_5_MODE_');
    }

    /**
     * Запрос с атрибутом указывающим на класс вне контейнера который имеет тег NoAutowire.
     * Непосредственный процесс автодополнения.
     * autowiring.mode = 0
     */
    public function testDIAutowiringV22(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $config = $this->framework::DEFAULT_CONFIG;

        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/di-autowire/005';
        $config['system']['autowiring.mode'] = 0;

        $this->assertEquals($this->framework->run($params, $config), 'HL_AUTOWIRE_DI_5_MODE_0');
    }

    /**
     * Запрос с атрибутом указывающим на класс вне контейнера который имеет тег NoAutowire.
     * Непосредственный процесс автодополнения.
     * autowiring.mode = 1 (без автовайринга - ошибка)
     */
    public function testDIAutowiringV23(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $config = $this->framework::DEFAULT_CONFIG;

        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/di-autowire/005';
        $config['system']['autowiring.mode'] = 1;

        $this->assertFalse($this->framework->run($params, $config) === 'HL_AUTOWIRE_DI_5_MODE_1');
    }

    /**
     * Запрос с атрибутом указывающим на класс вне контейнера который имеет тег NoAutowire.
     * Непосредственный процесс автодополнения.
     * autowiring.mode = 2
     */
    public function testDIAutowiringV24(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $config = $this->framework::DEFAULT_CONFIG;

        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/di-autowire/005';
        $config['system']['autowiring.mode'] = 2;

        $this->assertFalse($this->framework->run($params, $config) === 'HL_AUTOWIRE_DI_5_MODE_2');
    }

    /**
     * Запрос с атрибутом указывающим на класс вне контейнера который имеет тег NoAutowire.
     * Непосредственный процесс автодополнения.
     * autowiring.mode = 3
     */
    public function testDIAutowiringV25(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $config = $this->framework::DEFAULT_CONFIG;

        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/di-autowire/005';
        $config['system']['autowiring.mode'] = 3;

        $this->assertFalse($this->framework->run($params, $config) === 'HL_AUTOWIRE_DI_5_MODE_3');
    }

    /**
     * Запрос на прямое внедрение зависимости класса вне контейнера.
     * Непосредственный процесс автодополнения.
     * autowiring.mode = null (по умолчанию)
     */
    public function testDIAutowiringV26(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/di-autowire/063';

        $this->assertTrue($this->framework->run($params) === 'HL_AUTOWIRE_DI_3_MODE_');
    }

    /**
     * Запрос на прямое внедрение зависимости класса вне контейнера.
     * Непосредственный процесс автодополнения.
     * autowiring.mode = 0
     */
    public function testDIAutowiringV27(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $config = $this->framework::DEFAULT_CONFIG;

        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/di-autowire/063';
        $config['system']['autowiring.mode'] = 0;

        $this->assertEquals($this->framework->run($params, $config), 'HL_AUTOWIRE_DI_3_MODE_0');
    }

    /**
     * Запрос на прямое внедрение зависимости класса вне контейнера.
     * Непосредственный процесс автодополнения.
     * autowiring.mode = 1 (без автовайринга - ошибка)
     */
    public function testDIAutowiringV28(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $config = $this->framework::DEFAULT_CONFIG;

        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/di-autowire/063';
        $config['system']['autowiring.mode'] = 1;

        $this->assertFalse($this->framework->run($params, $config) === 'HL_AUTOWIRE_DI_3_MODE_1');
    }

    /**
     * Запрос на прямое внедрение зависимости класса вне контейнера.
     * Непосредственный процесс автодополнения.
     * autowiring.mode = 2
     */
    public function testDIAutowiringV29(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $config = $this->framework::DEFAULT_CONFIG;

        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/di-autowire/063';
        $config['system']['autowiring.mode'] = 2;

        $this->assertEquals($this->framework->run($params, $config), 'HL_AUTOWIRE_DI_3_MODE_2');
    }

    /**
     * Запрос на прямое внедрение зависимости класса вне контейнера.
     * Непосредственный процесс автодополнения.
     * autowiring.mode = 3 (нет тега - ошибка)
     */
    public function testDIAutowiringV30(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $config = $this->framework::DEFAULT_CONFIG;

        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/di-autowire/063';
        $config['system']['autowiring.mode'] = 3;

        $this->assertFalse($this->framework->run($params, $config) === 'HL_AUTOWIRE_DI_3_MODE_3');
    }

    /**
     * Запрос на прямое внедрение зависимости класса вне контейнера с тегом AllowAutowire.
     * Непосредственный процесс автодополнения.
     * autowiring.mode = null (по умолчанию)
     */
    public function testDIAutowiringV31(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/di-autowire/064';

        $this->assertTrue($this->framework->run($params) === 'HL_AUTOWIRE_DI_4_MODE_');
    }

    /**
     * Запрос на прямое внедрение зависимости класса вне контейнера с тегом AllowAutowire.
     * Непосредственный процесс автодополнения.
     * autowiring.mode = 0
     */
    public function testDIAutowiringV32(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $config = $this->framework::DEFAULT_CONFIG;

        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/di-autowire/064';
        $config['system']['autowiring.mode'] = 0;

        $this->assertEquals($this->framework->run($params, $config), 'HL_AUTOWIRE_DI_4_MODE_0');
    }

    /**
     * Запрос на прямое внедрение зависимости класса вне контейнера с тегом AllowAutowire.
     * Непосредственный процесс автодополнения.
     * autowiring.mode = 1 (без автовайринга - ошибка)
     */
    public function testDIAutowiringV33(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $config = $this->framework::DEFAULT_CONFIG;

        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/di-autowire/064';
        $config['system']['autowiring.mode'] = 1;

        $this->assertFalse($this->framework->run($params, $config) ==='HL_AUTOWIRE_DI_4_MODE_1');
    }

    /**
     * Запрос на прямое внедрение зависимости класса вне контейнера с тегом AllowAutowire.
     * Непосредственный процесс автодополнения.
     * autowiring.mode = 2
     */
    public function testDIAutowiringV34(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $config = $this->framework::DEFAULT_CONFIG;

        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/di-autowire/064';
        $config['system']['autowiring.mode'] = 2;

        $this->assertEquals($this->framework->run($params, $config), 'HL_AUTOWIRE_DI_4_MODE_2');
    }

    /**
     * Запрос на прямое внедрение зависимости класса вне контейнера с тегом AllowAutowire.
     * Непосредственный процесс автодополнения.
     * autowiring.mode = 3 (есть тег - нет ошибки)
     */
    public function testDIAutowiringV35(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $config = $this->framework::DEFAULT_CONFIG;

        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/di-autowire/064';
        $config['system']['autowiring.mode'] = 3;

        $this->assertEquals($this->framework->run($params, $config), 'HL_AUTOWIRE_DI_4_MODE_3');
    }

    /**
     * Запрос на прямое внедрение зависимости класса вне контейнера с тегом NoAutowire.
     * Непосредственный процесс автодополнения.
     * autowiring.mode = null (по умолчанию)
     */
    public function testDIAutowiringV36(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/di-autowire/065';

        $this->assertTrue($this->framework->run($params) === 'HL_AUTOWIRE_DI_5_MODE_');
    }

    /**
     * Запрос на прямое внедрение зависимости класса вне контейнера с тегом NoAutowire.
     * Непосредственный процесс автодополнения.
     * autowiring.mode = 0
     */
    public function testDIAutowiringV37(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $config = $this->framework::DEFAULT_CONFIG;

        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/di-autowire/065';
        $config['system']['autowiring.mode'] = 0;

        $this->assertEquals($this->framework->run($params, $config), 'HL_AUTOWIRE_DI_5_MODE_0');
    }

    /**
     * Запрос на прямое внедрение зависимости класса вне контейнера с тегом NoAutowire.
     * Непосредственный процесс автодополнения.
     * autowiring.mode = 1 (без автовайринга - ошибка)
     */
    public function testDIAutowiringV38(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $config = $this->framework::DEFAULT_CONFIG;

        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/di-autowire/065';
        $config['system']['autowiring.mode'] = 1;

        $this->assertFalse($this->framework->run($params, $config) === 'HL_AUTOWIRE_DI_5_MODE_1');
    }

    /**
     * Запрос на прямое внедрение зависимости класса вне контейнера с тегом NoAutowire.
     * Непосредственный процесс автодополнения.
     * autowiring.mode = 2
     */
    public function testDIAutowiringV39(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $config = $this->framework::DEFAULT_CONFIG;

        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/di-autowire/065';
        $config['system']['autowiring.mode'] = 2;

        $this->assertFalse($this->framework->run($params, $config) === 'HL_AUTOWIRE_DI_5_MODE_2');
    }

    /**
     * Запрос на прямое внедрение зависимости класса вне контейнера с тегом NoAutowire.
     * Непосредственный процесс автодополнения.
     * autowiring.mode = 3
     */
    public function testDIAutowiringV40(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $config = $this->framework::DEFAULT_CONFIG;

        $params['SERVER']['REQUEST_URI'] = '/test-container/controller/di-autowire/065';
        $config['system']['autowiring.mode'] = 3;

        $this->assertFalse($this->framework->run($params, $config) === 'HL_AUTOWIRE_DI_5_MODE_3');
    }
}
