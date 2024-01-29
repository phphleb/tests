<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Hleb\Helpers\ArrayHelper;
use Phphleb\TestO\TestCase;

class ArrayHelperTest extends TestCase
{
    public function testArrayHelperIsAssocV1(): void
    {
        $result = ArrayHelper::isAssoc([]);

        $this->assertFalse($result);
    }

    public function testArrayHelperIsAssocV2(): void
    {
        $result = ArrayHelper::isAssoc([1, 'a', ['test' => 100500], new \DateTime()]);

        $this->assertFalse($result);
    }

    public function testArrayHelperIsAssocV3(): void
    {
        $result = ArrayHelper::isAssoc([2 => 'first', 'a', ['test' => 100500]]);

        $this->assertTrue($result);
    }

    public function testArrayHelperIsAssocV4(): void
    {
        $result = ArrayHelper::isAssoc(['first' => 1, 'second' => ['test' => 100500]]);

        $this->assertTrue($result);
    }

    public function testArrayHelperAppendV1(): void
    {
        $result = ArrayHelper::append(
            ['first' => 100, 'second' => 500],
            ['second' => 200]
        );
        $test = ['first' => 100, 'second' => 200];
        $this->assertArrayEquals($result, $test);
    }

    public function testArrayHelperAppendV2(): void
    {
        $result = ArrayHelper::append(
            ['first' => 100, 'second' => 500],
            ['second' => 200, 'none' => 300]
        );
        $test = ['first' => 100, 'second' => 200];
        $this->assertArrayEquals($result, $test);
    }

    public function testArrayHelperAppendV3(): void
    {
        $result = ArrayHelper::append([], ['second' => 200, 'none' => 300]);
        $this->assertArrayEquals($result, []);
    }

    public function testArrayHelperAppendV4(): void
    {
        $obj = new \DateTime();
        $result = ArrayHelper::append(['first' => 100, 'second' => $obj], []);
        $this->assertArrayEquals($result, ['first' => 100, 'second' => $obj]);
    }

    public function testArrayHelperSortDescByFieldV1(): void
    {
        $origin = [
            ['first' => '2'],
            ['first' => 1],
            ['first' => 0],
            ['first' => 3],
        ];
        $result = ArrayHelper::sortDescByField($origin, 'first');
        $test = [
            ['first' => 3],
            ['first' => '2'],
            ['first' => 1],
            ['first' => 0],
        ];

        $this->assertArrayEquals($result, $test);
    }

    public function testArrayHelperSortDescByFieldV2(): void
    {
        $origin = [
            ['first' => 'b'],
            ['first' => 'aa'],
            ['first' => '0'],
            ['first' => 'cd'],
        ];
        $result = ArrayHelper::sortDescByField($origin, 'first');
        $test = [
            ['first' => 'cd'],
            ['first' => 'b'],
            ['first' => 'aa'],
            ['first' => '0'],

        ];
        $this->assertArrayEquals($result, $test);
    }

    public function testArrayHelperSortDescByFieldV3(): void
    {
        $origin = [
            ['first' => 'a', 'second' => 'b'],
            ['first' => 'b', 'second' => 'a'],
            ['first' => 'c', 'second' => 0.9],
            ['first' => 'd', 'second' => 'c'],
        ];
        $result = ArrayHelper::sortDescByField($origin, 'second');
        $test = [
            ['first' => 'd', 'second' => 'c'],
            ['first' => 'a', 'second' => 'b'],
            ['first' => 'b', 'second' => 'a'],
            ['first' => 'c', 'second' => 0.9],
         ];
        $this->assertArrayEquals($result, $test);
    }

    public function testArrayHelperSortAscByFieldV1(): void
    {
        $origin = [
            ['first' => 'a', 'second' => 'b'],
            ['first' => 'b', 'second' => 'a'],
            ['first' => 'c', 'second' => 0.9],
            ['first' => 'd', 'second' => 'c'],
        ];
        $result = ArrayHelper::sortAscByField($origin, 'second');
        $test = [
            ['first' => 'c', 'second' => 0.9],
            ['first' => 'b', 'second' => 'a'],
            ['first' => 'a', 'second' => 'b'],
            ['first' => 'd', 'second' => 'c'],
        ];
        $this->assertArrayEquals($result, $test);
    }

    public function testArrayHelperSortAscByFieldV2(): void
    {
        $origin = [];
        $result = ArrayHelper::sortAscByField($origin, 'second');
        $test = [];
        $this->assertArrayEquals($result, $test);
    }

    public function testArrayHelperMoveToFirstV1(): void
    {
        $origin = [];
        $result = ArrayHelper::moveToFirst($origin, 'first');
        $test = [];
        $this->assertArrayEquals($result, $test);
    }

    public function testArrayHelperMoveToFirstV2(): void
    {
        $origin = [
            'a' => 100,
            'b' => [1,2,3],
            'c' => 300,
            'd' => 400,
        ];
        $result = ArrayHelper::moveToFirst($origin, 'c');
        $test = [
            'c' => 300,
            'a' => 100,
            'b' => [1,2,3],
            'd' => 400,
        ];
        $this->assertArrayEquals($result, $test);
    }

    public function testArrayHelperMoveToFirstV3(): void
    {
        $origin = [100, [1,2,3], 300, 400];
        $result = ArrayHelper::moveToFirst($origin, '2');
        $test = [300, 100, [1,2,3], 400];
        $this->assertArrayEquals($result, $test);
    }

    public function testArrayHelperOnlyV1(): void
    {
        $origin = ['1' => 100, '2' => [1,2,3], '3' => 300, '4' => 400];
        $result = ArrayHelper::only($origin, ['1', '3']);
        $test = ['1' => 100, '3' => 300];
        $this->assertArrayEquals($result, $test);
    }

    public function testArrayHelperOnlyV2(): void
    {
        $origin = [];
        $result = ArrayHelper::only($origin, ['1', '3']);
        $test = [];
        $this->assertArrayEquals($result, $test);
    }

    public function testArrayHelperOnlyV3(): void
    {
        $origin = [100, [1,2,3], 300, 400];
        $result = ArrayHelper::only($origin, [0, 3]);
        $test = [100, 400];
        $this->assertArrayEquals($result, $test);
    }

    public function testArrayHelperDivideV1(): void
    {
        $result = ArrayHelper::divide([]);
        $test = [[], []];
        $this->assertArrayEquals($result, $test);
    }

    public function testArrayHelperDivideV2(): void
    {
        $origin = [10, 20, 30];
        $result = ArrayHelper::divide($origin);
        $test = [[0,1,2], [10, 20, 30]];
        $this->assertArrayEquals($result, $test);
    }

    public function testArrayHelperDivideV3(): void
    {
        $origin = ['a' => 10, 'b' => 20, 2 => null];
        $result = ArrayHelper::divide($origin);
        $test = [['a','b',2], [10, 20, null]];
        $this->assertArrayEquals($result, $test);
    }

    public function testArrayHelperGetV1(): void
    {
        $origin = ['products' => ['desk' => ['price' => 100]]];
        $result = ArrayHelper::get($origin, 'products.desk.price', 0);
        $this->assertTrue($result === 100);
    }

    public function testArrayHelperGetV2(): void
    {
        $origin = ['products' => ['desk' => ['price' => 100]]];
        $result = ArrayHelper::get($origin, 'products.desk');
        $this->assertArrayEquals($result, ['price' => 100]);
    }

    public function testArrayHelperGetV3(): void
    {
        $origin = ['products' => ['desk' => ['price' => 100]]];
        $result = ArrayHelper::get($origin, 'products.desk.example', 0);
        $this->assertTrue($result === 0);
    }

    public function testArrayHelperGetV4(): void
    {
        $result = ArrayHelper::get([], 'test.example', 0);
        $this->assertTrue($result === 0);
    }

    public function testArrayHelperGetV5(): void
    {
        $origin = [100500];
        $result = ArrayHelper::get($origin, 0, 0);
        $this->assertTrue($result === 100500);
    }

    public function testArrayHelperGetV6(): void
    {
        $origin = [10, 100500];
        $result = ArrayHelper::get($origin, 1, 0);
        $this->assertTrue($result === 100500);
    }

    public function testArrayHelperGetV7(): void
    {
        $origin = [null, 'test' => 100500];
        $result = ArrayHelper::get($origin, 'test', 0);
        $this->assertTrue($result === 100500);
    }

    public function testArrayHelperForgetV1(): void
    {
        $origin = ['products' => ['desk' => ['price' => 100]]];
        ArrayHelper::forget($origin, 'products.desk');
        $this->assertArrayEquals($origin, ['products' => []]);
    }

    public function testArrayHelperForgetV2(): void
    {
        $origin = ['products' => ['desk' => ['price' => 100]]];
        ArrayHelper::forget($origin, 'products');
        $this->assertArrayEquals($origin, []);
    }

    public function testArrayHelperForgetV3(): void
    {
        $origin = [];
        ArrayHelper::forget($origin, 'products');
        $this->assertArrayEquals($origin, []);
    }

    public function testArrayHelperForgetV4(): void
    {
        $origin = [10, 20];
        ArrayHelper::forget($origin, 1);
        $this->assertArrayEquals($origin, [10]);
    }

    public function testArrayHelperForgetV5(): void
    {
        $origin = ['products' => ['desk' => ['price' => 100]], 'orders' => ['value' => 20]];
        ArrayHelper::forget($origin, ['products.desk', 'orders.value']);
        $this->assertArrayEquals($origin, ['products' => [], 'orders' => []]);
    }

    public function testArrayHelperForgetV6(): void
    {
        $origin = ['products' => ['desk' => ['price' => 100]], 'orders' => ['value' => 20]];
        ArrayHelper::forget($origin, ['products.desk', 'undefined']);
        $this->assertArrayEquals($origin, ['products' => [],  'orders' => ['value' => 20]]);
    }

    public function testArrayHelperHasV1(): void
    {
        $origin = ['product' => ['name' => 'Desk', 'price' => 100]];
        $result = ArrayHelper::has( $origin, 'product.name');
        $this->assertTrue($result);
    }

    public function testArrayHelperHasV2(): void
    {
        $origin = ['product' => ['name' => 'Desk', 'price' => 100]];
        $result = ArrayHelper::has( $origin, 'product.noname');
        $this->assertFalse($result);
    }

    public function testArrayHelperHasV3(): void
    {
        $result = ArrayHelper::has([], 'product.noname');
        $this->assertFalse($result);
    }

    public function testArrayHelperHasV4(): void
    {
        $result = ArrayHelper::has([100], [0]);
        $this->assertTrue($result);
    }

    public function testArrayHelperHasV5(): void
    {
        $result = ArrayHelper::has([100, 200], 1);
        $this->assertTrue($result);
    }

    public function testArrayHelperHasV6(): void
    {
        $result = ArrayHelper::has([], 1);
        $this->assertFalse($result);
    }

    public function testArrayHelperHasV7(): void
    {
        $result = ArrayHelper::has([], 'test.value');
        $this->assertFalse($result);
    }

    public function testArrayHelperAddV1(): void
    {
        $result = ArrayHelper::add(['name' => 'Table'], 'price', 100);
        $this->assertArrayEquals($result, ['name' => 'Table', 'price' => 100]);
    }

    public function testArrayHelperAddV2(): void
    {
        $result = ArrayHelper::add(['name' => 'Table', 'price' => null], 'price', 100);
        $this->assertArrayEquals($result, ['name' => 'Table', 'price' => 100]);
    }

    public function testArrayHelperAddV3(): void
    {
        $result = ArrayHelper::add(['name' => 'Table', 'price' => 200], 'price', 100);
        $this->assertArrayEquals($result, ['name' => 'Table', 'price' => 200]);
    }

    public function testArrayHelperAddV4(): void
    {
        $result = ArrayHelper::add(['name' => ['table' => 'Row']], 'name.table', 100);
        $this->assertArrayEquals($result, ['name' => ['table' => 'Row']]);
    }

    public function testArrayHelperAddV5(): void
    {
        $result = ArrayHelper::add(['name' => ['table' => 'Row']], 'name.table2', 100);
        $this->assertArrayEquals($result, ['name' => ['table' => 'Row', 'table2' => 100]]);
    }

    public function testArrayHelperAddV6(): void
    {
        $result = ArrayHelper::add([], 'name.table', 100);
        $this->assertArrayEquals($result, ['name' => ['table' => 100]]);
    }

    public function testArrayHelperAddV7(): void
    {
        $result = ArrayHelper::add([], 'name.table', null);
        $this->assertArrayEquals($result, ['name' => ['table' => null]]);
    }

    public function testArrayHelperAddV8(): void
    {
        $result = ArrayHelper::add([1,2,3], 1, 'second');
        $this->assertArrayEquals($result, [1,2,3]);
    }

    public function testArrayHelperAddV9(): void
    {
        $result = ArrayHelper::add([1,null,3], 1, 'second');
        $this->assertArrayEquals($result, [1,'second',3]);
    }

    public function testArrayHelperAddV10(): void
    {
        $result = ArrayHelper::add([1,2,3], 3, 4);
        $this->assertArrayEquals($result, [1,2,3,4]);
    }

    public function testArrayHelperSetV1(): void
    {
        $origin = [1,2,3];
        ArrayHelper::set($origin, 3, 4);
        $this->assertArrayEquals($origin, [1,2,3,4]);
    }

    public function testArrayHelperSetV2(): void
    {
        $origin = ['products' => ['desk' => ['price' => 100]]];
        ArrayHelper::set($origin, 'products.desk.price', 200);
        $this->assertArrayEquals($origin, ['products' => ['desk' => ['price' => 200]]]);
    }

    public function testArrayHelperSetV3(): void
    {
        $origin = ['products' => ['desk' => ['price' => 100]]];
        ArrayHelper::set($origin, 'products.desk.value', 200);
        $this->assertArrayEquals($origin, ['products' => ['desk' => ['price' => 100, 'value' => 200]]]);
    }

    public function testArrayHelperSetV4(): void
    {
        $origin = ['products' => ['desk' => ['price' => 100]]];
        ArrayHelper::set($origin, null, [1,2,3]);
        $this->assertArrayEquals($origin, [1,2,3]);
    }

    public function testArrayHelperExpandV1(): void
    {
        $origin = [
            'user.name' => 'Sherlock Holmes',
            'user.occupation' => 'detective',
        ];
        $result = ArrayHelper::expand($origin);
        $this->assertArrayEquals($result, ['user' => ['name' => 'Sherlock Holmes', 'occupation' => 'detective']]);
    }

    public function testArrayHelperExpandV2(): void
    {
        $result = ArrayHelper::expand([]);
        $this->assertArrayEquals($result, []);
    }

    public function testArrayHelperExpandV3(): void
    {
        $origin = [
            'first.second' => [],
            'first.second.value' => 100500,
            'first.second.null' => null,
        ];

        $result = ArrayHelper::expand($origin);
        $this->assertArrayEquals($result, ['first' => ['second' => ['value' => 100500, 'null' => null]]]);
    }

    public function testArrayHelperMoveFirstByValueV1(): void
    {
        $origin = [
            'first' => 1,
            'second' => 2,
            'third' => 3,
        ];
        $expected = [
            'second' => 2,
            'first' => 1,
            'third' => 3,
        ];

        $result = ArrayHelper::moveFirstByValue($origin, 2);

        $this->assertArrayEquals($result, $expected);
    }

    public function testArrayHelperMoveFirstByValueV2(): void
    {
        $origin = [
            'first',
            'second',
            'third',
        ];
        $expected = [
            'second',
            'first',
            'third',
        ];

        $result = ArrayHelper::moveFirstByValue($origin, 'second');

        $this->assertArrayEquals($result, $expected);
    }

    public function testArrayHelperMoveFirstByValueV3(): void
    {
        $origin = [
            1 => 'first',
            'v2' => 'second',
            3 => 'third',
        ];
        $expected = [
            'v2' => 'second',
            1 => 'first',
            3 => 'third',
        ];

        $result = ArrayHelper::moveFirstByValue($origin, 'second');

        $this->assertArrayEquals($result, $expected);
    }

}