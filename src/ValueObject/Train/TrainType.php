<?php

declare(strict_types=1);

namespace JrPriceDomain\ValueObject\Train;

use JrPriceDomain\ValueObject\Abstract\Enum;

/**
 * Class Train.
 *
 * @extends Enum<int>
 */
class TrainType extends Enum
{
    public const NOZOMI = 1;
    public const HIKARI = 2;

    public function isHikari(): bool
    {
        return $this->valueEqual(self::HIKARI);
    }

    public function isNozomi(): bool
    {
        return $this->valueEqual(self::NOZOMI);
    }
}
