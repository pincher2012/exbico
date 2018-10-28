<?php

declare(strict_types=1);

namespace app\services;

use PHPUnit\Framework\TestCase;

class SeparatorServiceTest extends TestCase
{
    /**
     * @dataProvider providerSeparate
     *
     * @param int   $expected
     * @param int   $number
     * @param array $list
     *
     * @throws \Exception
     */
    public function testSeparate(int $expected, int $number, array $list): void
    {
        $service = new SeparatorService();
        $result = $service->separate($number, $list);

        self::assertEquals($expected, $result);
    }

    /**
     * @return array
     */
    public function providerSeparate(): array
    {
        return [
            [-1, 1, []],
            [-1, 1, [1]],
            [1, 1, [1, 2]],
            [1, 1, [1, 2, 1]],
            [2, 1, [1, 2, 3]],
            [4, 5, [5, 5, 1, 7, 2, 3, 5]],
        ];
    }
}
