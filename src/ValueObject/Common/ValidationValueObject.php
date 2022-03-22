<?php

declare(strict_types=1);

namespace JrPriceDomain\ValueObject\Common;

trait ValidationValueObject
{
    private function assertPercent(float $value): void
    {
        if (!(0.00 <= $value && $value <= 1.00)) {
            throw new \InvalidArgumentException("Percent is specified from 0.00 to 1.00 : {$value}");
        }
    }

    /**
     * 券売機で１円硬貨、５円硬貨を扱わないため、運賃10円単位でなければエラーを投げる.
     */
    private function assertJrTicketVendingMachinePrice(int $value): void
    {
        if (0 !== $value % 10) {
            throw new \InvalidArgumentException("Not in units of 10 yen : {$value}");
        }
    }
}
