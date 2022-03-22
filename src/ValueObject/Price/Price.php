<?php

declare(strict_types=1);

namespace JrPriceDomain\ValueObject\Price;

use JrPriceDomain\ValueObject\Common\ValidationValueObject;
use JrPriceDomain\ValueObject\ValueObject;

class Price implements ValueObject
{
    use ValidationValueObject;

    /**
     * Distance constructor.
     */
    public function __construct(private int $value)
    {
        $this->assertJrTicketVendingMachinePrice($this->value);
    }

    public function value(): int
    {
        return $this->value;
    }
}
