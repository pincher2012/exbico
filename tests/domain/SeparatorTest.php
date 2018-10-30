<?php

declare(strict_types=1);

namespace app\domain;

use PHPUnit\Framework\TestCase;

/**
 * Class SeparatorTest.
 */
class SeparatorTest extends TestCase
{
    /**
     * @dataProvider providerSeparate
     *
     * @param int   $expected
     * @param int   $number
     * @param array $list
     */
    public function testSeparate(int $expected, int $number, array $list): void
    {
        $params = new SeparatorParams($number, $list);
        $service = new Separator();
        $result = $service->separate($params);

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
