<?php

declare(strict_types=1);

namespace Phphleb\Tests;

namespace Phphleb\tests\system\framework\standard\unit;

use Hleb\CoreErrorException;
use Hleb\Reference\ArrReference;
use Hleb\Static\DI;
use Phphleb\TestO\TestCase;
use Phphleb\Tests\FifthNewObjectWithDi;
use Phphleb\Tests\FirstNewObjectWithDi;
use Phphleb\Tests\SecondNewObjectWithDi;
use Phphleb\Tests\ThirdNewObjectWithDi;

class CreatorTest extends TestCase
{
    public function __construct()
    {
        if (!class_exists(FirstNewObjectWithDi::class)) {
            require __DIR__ . '/source/FirstNewObjectWithDi.php';
        }
        if (!class_exists(SecondNewObjectWithDi::class)) {
            require __DIR__ . '/source/SecondNewObjectWithDi.php';
        }
        if (!class_exists(ThirdNewObjectWithDi::class)) {
            require __DIR__ . '/source/ThirdNewObjectWithDi.php';
        }
        if (!class_exists(FifthNewObjectWithDi::class)) {
            require __DIR__ . '/source/FifthNewObjectWithDi.php';
        }
    }

    public function testCreatorObjectV1(): void
    {
        $result = (DI::object(FirstNewObjectWithDi::class))->result();

        $revise = [];

        $this->assertArrayEquals($result, $revise);
    }

    public function testCreatorObjectV2(): void
    {
        $result = (DI::object(SecondNewObjectWithDi::class))->result();

        $revise = ['DateTime', 'Hleb\Reference\ArrReference'];

        $this->assertArrayEquals($result, $revise);
    }

    public function testCreatorObjectV3(): void
    {
        $result = (DI::object(
            ThirdNewObjectWithDi::class,
            ['dateTime' => \DateTime::createFromFormat('d/m/Y', '23/11/2023')]
        ))->result();

        $revise = ['23/11/2023', 'DateTime'];

        $this->assertArrayEquals($result, $revise);
    }

    public function testCreatorObjectV4(): void
    {
        $check = false;
        try {
            (DI::object(ArrReference::class))->result();
        } catch (CoreErrorException) {
            $check = true;
        }

        $this->assertTrue($check);
    }

    public function testCreatorMethodV1(): void
    {
        $result = DI::method(
            new FirstNewObjectWithDi(),
            'getTime',
            ['time' => \DateTime::createFromFormat('d/m/Y', '23/11/2023')]
        );

        $this->assertTrue($result === '23/11/2023');
    }

    public function testCreatorMethodV2(): void
    {
        $result = DI::method(
            new FirstNewObjectWithDi(),
            'getFromContainerAndDefault',
        );

        $revise = ['arr' => 'Hleb\Reference\ArrReference', 'value' => 'qwerty'];

        $this->assertArrayEquals($result, $revise);
    }

    public function testCreatorMethodV3(): void
    {
        $result = DI::method(
            new FirstNewObjectWithDi(),
            'checkStaticInvoice',
        );

        $this->assertTrue($result === 1000);
    }

    public function testCreatorMethodV4(): void
    {
        $result = DI::method(
            new FirstNewObjectWithDi(),
            'checkOtherContainerObject',
        );
        $revise = ['Hleb\Reference\ArrReference', 'DateTime'];

        $this->assertArrayEquals($result, $revise);
    }
}