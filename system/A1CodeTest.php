<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

class A1CodeTest extends TestCase
{
    private const DIRECTORY = __DIR__ . '/../../framework';

    /**
     * Проверка существования директории с фреймворком.
     */
    public function testCheckFrameworkDirectory()
    {
        $this->assertTrue((bool)\realpath(self::DIRECTORY));
    }

    /**
     * Проверка на валидность кода во фреймворке.
     */
    public function testAllCodeValidate()
    {
        if (!\function_exists('shell_exec')) {
            return;
        }
        $directory = \realpath(self::DIRECTORY);
        $files = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($directory)
        );
        $result = true;
        $errors = [];
        foreach ($files as $file) {
            if ($file->isFile() && $file->getExtension() === "php") {
                $content = \exec("php -l " . $file->getRealPath(), $output, $returnVar);
                if ($returnVar !== 0) {
                    $result = false;
                    $errors[] = $content;
                }
            }
        }
        if ($errors) {
            throw new \Error(implode(PHP_EOL, $errors));
        }
        $this->assertTrue($result);
    }
}