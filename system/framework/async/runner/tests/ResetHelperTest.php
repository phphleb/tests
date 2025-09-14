<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use App\ResetItemWithConstructor;
use Hleb\Constructor\Containers\CoreContainer;
use Hleb\Helpers\ResetAndRollbackHelper;
use Phphleb\TestO\TestCase;
use App\ResetItem;

class ResetHelperTest extends TestCase
{
    public function __construct()
    {
        require_once __DIR__ . '/../standard_autoloader.php';
    }

    public function testStandardResetService(): void
    {
        $item = new ResetItem();
        $item->setData(10);
        $services = [$item];
        ResetAndRollbackHelper::resetServices($services, NULL);
        $this->assertTrue($item->data === 0);
    }

    public function testStandardResetService2(): void
    {
        if (PHP_VERSION_ID >= 80400) {
            $lazyObject = CoreContainer::getLazyObject(ResetItem::class);
            $services = [$lazyObject];
            ResetAndRollbackHelper::resetServices($services, NULL);
            $this->assertTrue($lazyObject->data === null);
        }
    }

    public function testStandardResetService3(): void
    {
        if (PHP_VERSION_ID >= 80400) {
            $lazyObject = CoreContainer::getLazyObject(ResetItem::class);
            $lazyObject->setData(2);
            $services = [$lazyObject];

           ResetAndRollbackHelper::resetServices($services, NULL);
           $this->assertTrue($lazyObject->data === 0);
        }
    }

    public function testStandardResetServiceWithConstructor(): void
    {
        $item = new ResetItemWithConstructor(7);
        $item->setData(10);
        $services = [$item];
        ResetAndRollbackHelper::resetServices($services, NULL);
        $this->assertTrue($item->data === 0);
    }

    public function testStandardResetServiceWithConstructor2(): void
    {
        $object = CoreContainer::getLazyObject(ResetItemWithConstructor::class, [7]);
        $this->assertTrue($object->data === 7);
    }

    public function testStandardResetServiceWithConstructor3(): void
    {
        if (PHP_VERSION_ID >= 80400) {
            $lazyObject = CoreContainer::getLazyObject(ResetItemWithConstructor::class, [7]);
            $services = [$lazyObject];
            ResetAndRollbackHelper::resetServices($services, NULL);
            $this->assertTrue($lazyObject->data === 0);
        }
    }

    public function testStandardResetServiceWithConstructor4(): void
    {
        if (PHP_VERSION_ID >= 80400) {
            $lazyObject = CoreContainer::getLazyObject(ResetItemWithConstructor::class, [7]);
            $lazyObject->setData(2);

            $services = [$lazyObject];
            ResetAndRollbackHelper::resetServices($services, NULL);
            $this->assertTrue($lazyObject->data === 0);
        }
    }
}
