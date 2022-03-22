<?php

declare(strict_types=1);

namespace JrPriceDomain\ValueObject\Group;

use JrPriceDomain\ValueObject\ValueObject;

class NumberOfPassengers implements ValueObject
{
    /**
     * NumberOfPeople constructor.
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
