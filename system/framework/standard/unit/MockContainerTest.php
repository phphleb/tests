<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Hleb\Init\ShootOneselfInTheFoot\CsrfForTest;
use Hleb\Init\ShootOneselfInTheFoot\Mock;
use Hleb\Static\Csrf;
use Phphleb\TestO\TestCase;

class MockContainerTest extends TestCase
{
    public function __construct()
    {
        if (!class_exists(MockContainerCsrf::class)) {
            require_once __DIR__ . '/source/MockContainerCsrf.php';
        }
    }

    #[\Override]
    public function setUp(): void
    {
        Mock::cancel();
    }

    #[\Override]
    public function tearDown(): void
    {
        Mock::cancel();
    }

    public function testContainerMockV1(): void
    {
        CsrfForTest::set(new MockContainerCsrf());

        $result = Csrf::token();

        $this->assertTrue($result === 'example_token');
    }

    public function testContainerMockV2(): void
    {
        CsrfForTest::set(new MockContainerCsrf());

        $result = Csrf::field();

        $this->assertTrue($result === '<b>example_token</b>');
    }

    public function testContainerMockV3(): void
    {
        CsrfForTest::set(new MockContainerCsrf());

        $result = Csrf::validate('');

        $this->assertTrue($result);
    }
}