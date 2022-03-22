<?php

declare(strict_types=1);

namespace JrPriceDomain\Entity;

use Illuminate\Support\Collection;
use JrPriceDomain\ValueObject\ValueObject;

/**
 * Class FirstCollection.
 */
abstract class FirstCollection extends collection
{
    /**
     * @var array<ValueObject>
     */
    protected $items = [];
}
