<?php

declare(strict_types=1);

namespace Phphleb\Tests;

namespace Phphleb\Tests;

use Hleb\Helpers\PhpCommentHelper;
use Phphleb\TestO\TestCase;

class ClearingCommentTest extends TestCase
{
    private PhpCommentHelper $helper;

    public function __construct()
    {
        if (!class_exists(PhpCommentHelper::class)) {
            require __DIR__ . '/../../../../../framework/Helpers/PhpCommentHelper.php';
        }
        $this->helper = new PhpCommentHelper();
    }

    public function testMultilineCommentCleaner1(): void
    {
        $origin = "";

        $result = "";
        $clear = $this->helper->clearMultiLine($origin);

        $this->assertTrue($result === $clear);
    }

    public function testMultilineCommentCleaner2(): void
    {
        $origin = "/*test*/";

        $result = "";
        $clear = $this->helper->clearMultiLine($origin);

        $this->assertTrue($result === $clear);
    }

    public function testMultilineCommentCleaner3(): void
    {
        $origin = "/**
        * test
        */";

        $result = "";
        $clear = $this->helper->clearMultiLine($origin);

        $this->assertTrue($result === $clear);
    }

    public function testMultilineCommentCleaner4(): void
    {
        $origin = "/**
        * test
        */" . PHP_EOL . "file 'path/*'";

        $result = PHP_EOL . "file 'path/*'";
        $clear = $this->helper->clearMultiLine($origin);

        $this->assertTrue($result === $clear);
    }

    public function testMultilineCommentCleaner5(): void
    {
        $origin = "/*
        * test /
        */" . PHP_EOL . "file2 'path/*'";

        $result = PHP_EOL . "file2 'path/*'";
        $clear = $this->helper->clearMultiLine($origin);

        $this->assertTrue($result === $clear);
    }

    public function testMultilineCommentCleaner6(): void
    {
        $origin = "
        /**
        * Description
        */
        class Test {  
          /** @inheritDoc */
          #[\Override]    
          function foo() {
           // Run
          }
        }";

        $result = "
        class Test {  

          #[\Override]    
          function foo() {
           // Run
          }
        }";
        $clear = $this->helper->clearMultiLine($origin);

        $this->assertTrue($result === $clear);
    }

    public function testMultilineCommentCleaner7(): void
    {
        $origin = "/*
        * comment 1 /
        */
        text
        /** comment 2 */
        ";

        $result = "
        text

        ";
        $clear = $this->helper->clearMultiLine($origin);

        $this->assertTrue($result === $clear);
    }

    public function testMultilineCommentCleaner8(): void
    {
        $origin = "text /* no comment :( */";

        $result = "text /* no comment :( */";
        $clear = $this->helper->clearMultiLine($origin);

        $this->assertTrue($result === $clear);
    }

    public function testSingleLineCommentCleaner1(): void
    {
        $origin = "";

        $result = "";
        $clear = $this->helper->clearOneLiner($origin);

        $this->assertTrue($result === $clear);
    }

    public function testSingleLineCommentCleaner2(): void
    {
        $origin = "// test";

        $result = "";
        $clear = $this->helper->clearOneLiner($origin);

        $this->assertTrue($result === $clear);
    }

    public function testSingleLineCommentCleaner3(): void
    {
        $origin = "
        // test
        // test2
        text";

        $result = "

        text";
        $clear = $this->helper->clearOneLiner($origin);

        $this->assertTrue($result === $clear);
    }

    public function testSingleLineCommentCleaner4(): void
    {
        $origin = "
        start
        // test
        // test2
        end";

        $result = "
        start


        end";
        $clear = $this->helper->clearOneLiner($origin);

        $this->assertTrue($result === $clear);
    }

    public function testSingleLineCommentCleaner5(): void
    {
        $origin = "///// comment 1 // comment 2";

        $result = "";
        $clear = $this->helper->clearOneLiner($origin);

        $this->assertTrue($result === $clear);
    }

    public function testSingleLineCommentCleaner6(): void
    {
        $origin = " ///// comment 1 // comment 2 // /// comment 3 //";

        $result = "";
        $clear = $this->helper->clearOneLiner($origin);

        $this->assertTrue($result === $clear);
    }
}