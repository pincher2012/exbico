<?php

declare(strict_types=1);

namespace app\domain;

use JsonSerializable;

/**
 * Class SeparatorParams.
 */
class SeparatorParams implements JsonSerializable
{
    /**
     * @var int
     */
    private $number;

    /**
     * @var int[]
     */
    private $list;

    /**
     * SeparatorParams constructor.
     *
     * @param int   $number
     * @param int[] $list
     */
    public function __construct(int $number, array $list)
    {
        $this->number = $number;
        $this->list = $list;
    }

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @return int[]
     */
    public function getList(): array
    {
        return $this->list;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'number' => $this->number,
            'list' => $this->list,
        ];
    }
}
