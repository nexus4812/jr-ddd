<?php

declare(strict_types=1);

namespace JrPriceDomain\ValueObject\Season;

use JrPriceDomain\ValueObject\Abstract\Enum;

/**
 * Class Season.
 *
 * @extends Enum<int>
 */
class Season extends Enum
{
    public const REGULAR = 1; // 通常期
    public const PEAK = 2; // 繁忙期
    public const OFF_PEAK = 3; // 閑散期

    public function isRegular(): bool
    {
        return $this->valueEqual(self::REGULAR);
    }

    public function isPeak(): bool
    {
        return $this->valueEqual(self::PEAK);
    }

    public function isOffPeak(): bool
    {
        return $this->valueEqual(self::OFF_PEAK);
    }
}
