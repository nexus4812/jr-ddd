<?php

declare(strict_types=1);

namespace JrPriceDomain\ValueObject\Fare;

use JrPriceDomain\ValueObject\Common\ValidationValueObject;
use JrPriceDomain\ValueObject\ValueObject;

/**
 * Class Fare 運賃.
 */
class Fare implements ValueObject
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
