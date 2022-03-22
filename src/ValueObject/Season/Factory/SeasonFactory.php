<?php

declare(strict_types=1);

namespace JrPriceDomain\ValueObject\Season\Factory;

use JrPriceDomain\ValueObject\Season\MonthDay;
use JrPriceDomain\ValueObject\Season\Season;
use JrPriceDomain\ValueObject\ValueObjectFactory;

class SeasonFactory implements ValueObjectFactory
{
    public function factory(MonthDay $monthDay): Season
    {
        if ($monthDay->isBetween(new MonthDay(12, 15), new MonthDay(1, 15))) {
            return new Season(Season::PEAK);
        }

        if ($monthDay->isBetween(new MonthDay(1, 16), new MonthDay(1, 30))) {
            return new Season(Season::OFF_PEAK);
        }

        return new Season(Season::REGULAR);
    }
}
