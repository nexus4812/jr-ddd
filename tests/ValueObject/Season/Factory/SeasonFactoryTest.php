<?php

namespace Tests\ValueObject\Season\Factory;

use JrPriceDomain\ValueObject\Season\Factory\SeasonFactory;
use JrPriceDomain\ValueObject\Season\MonthDay;
use JrPriceDomain\ValueObject\Season\Season;
use PHPUnit\Framework\TestCase;

class SeasonFactoryTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     * @param MonthDay $monthDay
     * @param Season $expectedSeason
     */
    public function testFactory(MonthDay $monthDay, Season $expectedSeason): void
    {
        $valueObject = $this->createInstance()->factory($monthDay);
        static::assertSame($valueObject->value(), $expectedSeason->value());
    }

    /**
     * @return mixed[]
     */
    public function dataProvider(): array
    {
        return [
            'first of peak' => [new MonthDay(12,15), new Season(Season::PEAK)],
            'last of peak' => [new MonthDay(1,15), new Season(Season::PEAK)],

            'first of off peak' => [new MonthDay(1,16), new Season(Season::OFF_PEAK)],
            'last of off peak' => [new MonthDay(1,30), new Season(Season::OFF_PEAK)],

            'first of regular' => [new MonthDay(2,1), new Season(Season::REGULAR)],
            'last of regular' => [new MonthDay(12,14), new Season(Season::REGULAR)],
        ];
    }

    public function createInstance(): SeasonFactory
    {
        return new SeasonFactory();
    }
}
