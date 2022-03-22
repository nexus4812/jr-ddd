<?php

declare(strict_types=1);

namespace JrPriceDomain\ValueObject\Common;

trait JrPrice
{
    /**
     * JRの券売機では1円と5円を扱わないので、1の位を四捨五入して返す.
     */
    private function roundToJrPrice(float|int $price): int
    {
        return intval(round($price, -1));
    }
}
