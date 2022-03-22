<?php

declare(strict_types=1);

namespace JrPriceDomain\ValueObject\Passenger;

use JrPriceDomain\ValueObject\Abstract\Enum;

/**
 * Class Age.
 *
 * @extends Enum<int>
 */
class Passenger extends Enum
{
    public const ADULT = 1; // 大人
    public const CHILD = 2; // 子供

    public function isAdult(): bool
    {
        return $this->valueEqual(self::ADULT);
    }

    public function isChild(): bool
    {
        return $this->valueEqual(self::CHILD);
    }
}
