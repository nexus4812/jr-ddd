<?php

declare(strict_types=1);

namespace JrPriceDomain\ValueObject;

use JetBrains\PhpStorm\Immutable;

/**
 * Interface ValueObject.
 */
#[Immutable]
interface ValueObject
{
    /**
     * @return mixed
     */
    public function value();
}
