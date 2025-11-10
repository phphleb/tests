<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Hleb\Helpers\FlashSessionHelper;
use Hleb\Reference\SessionReference;
use Phphleb\TestO\TestCase;

class FlashSessionTest extends TestCase
{
    public const ID = '_hl_flash_';

    public function testEmptyFlashSession(): void
    {
        $session = [];

        FlashSessionHelper::update($session, self::ID);

        $this->assertArrayEquals($session, []);
    }

    public function testEmptyFlashSession2(): void
    {
        $session = [self::ID => []];

        FlashSessionHelper::update($session, self::ID);

        $this->assertArrayEquals($session, [self::ID => []]);
    }

    public function testNewFlashSession(): void
    {
        $session = [
            self::ID => [
                [
                    'new' => 'Test',
                    'old' => null,
                    'reps_left' => 1,
                ]]];

        FlashSessionHelper::update($session, self::ID);

        $checkSession1 = [
            self::ID => [
                [
                    'new' => null,
                    'old' => 'Test',
                    'reps_left' => 0,
                ]]];

        $this->assertArrayEquals($session, $checkSession1);

        FlashSessionHelper::update($checkSession1, self::ID);

        $checkSession2 = [self::ID => []];

        $this->assertArrayEquals($checkSession1, $checkSession2);
    }

    public function testFlashSessionWithSession(): void
    {
        $_SESSION = [];
        $ref = new SessionReference();
        $checkSession = [
            self::ID => [
                '_my_id' => [
                    'new' => 'Test',
                    'old' => null,
                    'reps_left' => 1,
                ]]];

        $ref->setFlash('_my_id', 'Test', 1);

        $this->assertArrayEquals($checkSession, $_SESSION);

        $checkFlash = $ref->getFlash('_my_id');

        $this->assertTrue($checkFlash === null);

        FlashSessionHelper::update($_SESSION, self::ID);

        $checkFlash = $ref->getFlash('_my_id');

        $this->assertEquals($checkFlash, 'Test');

        FlashSessionHelper::update($_SESSION, self::ID);

        $checkFlash = $ref->getFlash('_my_id');

        $this->assertTrue($checkFlash === null);

        $_SESSION = [];
    }

    public function testFlashSessionWithSession2(): void
    {
        $_SESSION = [];
        $ref = new SessionReference();

        $ref->setFlash('_my_id', 'Test', 10);

        FlashSessionHelper::update($_SESSION, self::ID);

        $checkFlash = $ref->getFlash('_my_id');

        $this->assertEquals($checkFlash, 'Test');

        FlashSessionHelper::update($_SESSION, self::ID);

        $checkFlash = $ref->getFlash('_my_id');

        $this->assertEquals($checkFlash, 'Test');

        $checkFlash = $ref->getAndClearFlash('_my_id');

        $this->assertEquals($checkFlash, 'Test');

        $checkFlash = $ref->getFlash('_my_id');

        $this->assertTrue($checkFlash === null);

        $_SESSION = [];
    }

    public function testFlashSessionWithSession3(): void
    {
        $_SESSION = [];
        $ref = new SessionReference();
        $session = [
            self::ID => [
                '_my_id1' => [
                    'new' => ['value' => 'Test1'],
                    'old' => null,
                    'reps_left' => 1,
                ],
                '_my_id2' => [
                    'new' => ['value' => 'Test2'],
                    'old' => null,
                    'reps_left' => 1,
                ],
                ]];

        $ref->setFlash('_my_id1', ['value' => 'Test1'], 1);
        $ref->setFlash('_my_id2', ['value' => 'Test2'], 1);

        $checkFlash = $ref->allFlash();

        $this->assertArrayEquals($session[self::ID], $checkFlash);

        FlashSessionHelper::update($_SESSION, self::ID);

        $session = [
            self::ID => [
                '_my_id1' => [
                    'new' => null,
                    'old' => ['value' => 'Test1'],
                    'reps_left' => 0,
                ],
                '_my_id2' => [
                    'new' => null,
                    'old' => ['value' => 'Test2'],
                    'reps_left' => 0,
                ],
            ]];

        $checkFlash = $ref->allFlash();

        $this->assertArrayEquals($session[self::ID], $checkFlash);

        $_SESSION = [];
    }
}