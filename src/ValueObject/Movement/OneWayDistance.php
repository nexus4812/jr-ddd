<?php

declare(strict_types=1);

namespace JrPriceDomain\ValueObject\Movement;

use JrPriceDomain\ValueObject\ValueObject;

/**
 * 片道の営業距離.
 *
 * Class Distance.
 */
class OneWayDistance implements ValueObject
{
    /**
     * Distance constructor.
     */
    public function __construct(private int $value)
    {
    }

    public function isOver(self $distance): bool
    {
        return $this->value <= $distance->value;
    }

    public function value(): int
    {
        return $this->value;
    }
}
