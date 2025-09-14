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
    public function testResetService(): void
    {
        $item = new ResetItem();
        $item->setData(10);
        $services = [$item];
        ResetAndRollbackHelper::resetServices($services, NULL);
        $this->assertTrue($item->data === 0);

        if (PHP_VERSION_ID >= 80400) {
            $lazyObject = CoreContainer::getLazyObject(ResetItem::class);
            $services = [$lazyObject];
            ResetAndRollbackHelper::resetServices($services, NULL);
            $this->assertTrue($lazyObject->data === null);

            $lazyObject->setData(2);

            $services = [$lazyObject];
            ResetAndRollbackHelper::resetServices($services, NULL);
            $this->assertTrue($lazyObject->data === 0);
        }
    }

    public function testResetServiceWithConstructor(): void
    {
        $item = new ResetItemWithConstructor(7);
        $item->setData(10);
        $services = [$item];
        ResetAndRollbackHelper::resetServices($services, NULL);
        $this->assertTrue($item->data === 0);

        $object = CoreContainer::getLazyObject(ResetItemWithConstructor::class, [7]);
        $this->assertTrue($object->data === 7);


        if (PHP_VERSION_ID >= 80400) {

            $lazyObject = CoreContainer::getLazyObject(ResetItemWithConstructor::class, [7]);
            $services = [$lazyObject];
            ResetAndRollbackHelper::resetServices($services, NULL);
            $this->assertTrue($lazyObject->data === 0);

            $lazyObject->setData(2);

            $services = [$lazyObject];
            ResetAndRollbackHelper::resetServices($services, NULL);
            $this->assertTrue($lazyObject->data === 0);
        }
    }
}
