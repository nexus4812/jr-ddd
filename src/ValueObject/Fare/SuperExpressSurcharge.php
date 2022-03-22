<?php

declare(strict_types=1);

namespace JrPriceDomain\ValueObject\Fare;

use JrPriceDomain\ValueObject\Common\ValidationValueObject;
use JrPriceDomain\ValueObject\ValueObject;

/**
 * Class SuperExpressSurcharge 特急料金.
 */
class SuperExpressSurcharge implements ValueObject
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
