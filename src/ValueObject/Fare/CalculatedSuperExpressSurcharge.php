<?php

declare(strict_types=1);

namespace JrPriceDomain\ValueObject\Fare;

use JrPriceDomain\ValueObject\Common\ValidationValueObject;
use JrPriceDomain\ValueObject\ValueObject;

/**
 * 座席や電車などの料金計算が終了した特急料金.
 *
 * Class CalculatedSuperExpressSurcharge
 */
class CalculatedSuperExpressSurcharge implements ValueObject
{
    use ValidationValueObject;

    public function __construct(private int $value)
    {
        $this->assertJrTicketVendingMachinePrice($this->value);
    }

    public function value(): int
    {
        return $this->value;
    }
}
