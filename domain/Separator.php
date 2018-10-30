<?php

declare(strict_types=1);

namespace app\domain;

/**
 * Class SeparatorService.
 */
final class Separator
{
    /**
     * Returns index of list divider.
     *
     * @param SeparatorParams $params
     *
     * @return int
     */
    public function separate(SeparatorParams $params): int
    {
        $list = $params->getList();
        $number = $params->getNumber();

        if (count($list) < 2) {
            return -1;
        }

        $i = -1;
        $lastIndex = count($list);
        $j = $lastIndex;

        while ($i < $j) {
            do {
                ++$i;
                if ($i === $lastIndex) {
                    return -1;
                }

                if ($i === $j && $list[$i] !== $number) {
                    return $i;
                }
            } while ($list[$i] !== $number);

            do {
                --$j;
                if ($j === -1) {
                    return -1;
                }

                if ($i === $j && $list[$j] === $number) {
                    return $i;
                }
            } while ($list[$j] === $number);
        }

        return -1;
    }
}
