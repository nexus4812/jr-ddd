<?php

declare(strict_types=1);

namespace JrPriceDomain\ValueObject\Movement;

use JrPriceDomain\ValueObject\Abstract\Enum;

/**
 * Class MovementType.
 *
 * @extends Enum<int>
 */
class MovementType extends Enum
{
    public const ONE_WAY = 1; // 片道
    public const ROUND_TRIP = 2; // 往復

    public function isOneWay(): bool
    {
        return $this->valueEqual(self::ONE_WAY);
    }

    public function isRoundTrip(): bool
    {
        return $this->valueEqual(self::ROUND_TRIP);
    }
}
