<?php
/**
 * Comment
 */

use Phphleb\Tests\ExampleClass;

\class_exists(ExampleClass::class) or require __DIR__ . '/ExampleClass.php';

(new ExampleClass())->t();