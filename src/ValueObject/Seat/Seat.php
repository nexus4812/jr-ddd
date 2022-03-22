<?php

declare(strict_types=1);

namespace JrPriceDomain\ValueObject\Seat;

use JrPriceDomain\ValueObject\Abstract\Enum;

/**
 * Class Seat.
 *
 * @extends Enum<int>
 */
class Seat extends Enum
{
    public const RESERVED = 1; // 指定席
    public const UNRESERVED = 2; // 自由席

    public function isReserved(): bool
    {
        return $this->valueEqual(self::RESERVED);
    }

    public function isUnreserved(): bool
    {
        return $this->valueEqual(self::UNRESERVED);
    }
}
