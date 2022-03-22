<?php

namespace Tests\ValueObject\Season;

use InvalidArgumentException;
use JrPriceDomain\ValueObject\Season\MonthDay;
use PHPUnit\Framework\TestCase;

class MonthDayTest extends TestCase
{
    /**
     * 想定していない日にちを入れると例外が投げられることを検証する
     *
     * @dataProvider throwInvalidArgumentExceptionDataProvider
     * @param int $month
     * @param int $day
     * @param string $expectedMessage
     */
    public function testThrowInvalidArgumentException(
        int $month,
        int $day,
        string $expectedMessage): void
    {
        static::expectException(InvalidArgumentException::class);
        static::expectExceptionMessage($expectedMessage);
        new MonthDay($month, $day);
    }

    /**
     * @return array<mixed>
     */
    public function throwInvalidArgumentExceptionDataProvider(): array
    {
        return [
            '0月を指定する' => [0, 12, "Month is specified from 1 to 12 : 0"],
            '13月を指定する' => [13, 12, "Month is specified from 1 to 12 : 13"],
            '0日を指定する' => [1, 0, "Day is specified from 1 to 31 : 0"],
            '32日を指定する' => [1, 32, "Day is specified from 1 to 31 : 32"],
        ];
    }

    public function testGetter(): void
    {
        $month = 1;
        $day = 15;
        $monthDay = new MonthDay($month, $day);
        static::assertSame($month, $monthDay->getMonth());
        static::assertSame($day, $monthDay->getDay());
    }

    /**
     * @dataProvider smallEqualDataProvider
     * @param MonthDay $start
     * @param MonthDay $end
     * @param bool $expected
     */
    public function testSmallEqual(
        MonthDay $start,
        MonthDay $end,
        bool $expected
    ): void
    {
        self::assertSame($expected, MonthDay::smallEqual($start, $end));
    }

    /**
     * @return array<mixed>
     */
    public function smallEqualDataProvider(): array
    {
        return [
            '同月かつ真' => [
                new MonthDay(1, 1),
                new MonthDay(1, 1),
                true
            ],
            '同月かつ偽' => [
                new MonthDay(1, 2),
                new MonthDay(1, 1),
                false
            ],
            '違う月かつ真' => [
                new MonthDay(2, 2),
                new MonthDay(3, 2),
                true
            ],
            '違う月かつ偽' => [
                new MonthDay(3, 2),
                new MonthDay(2, 2),
                false
            ],
        ];
    }

    /**
     * @dataProvider isBetweenDataProvider
     * @param MonthDay $now
     * @param MonthDay $start
     * @param MonthDay $end
     * @param bool $expected
     */
    public function testIsBetween(
        MonthDay $now,
        MonthDay $start,
        MonthDay $end,
        bool $expected
    ): void
    {
        self::assertSame($expected, $now->isBetween($start, $end));
    }

    /**
     * @return array<mixed>
     */
    public function isBetweenDataProvider(): array
    {
        // now
        // start
        // end
        // expected(bool)
        return [
            '年越しするかつ真' => [
                new MonthDay(1,15),
                new MonthDay(12,15),
                new MonthDay(1,15),
                true,
            ],
            '年越しするかつ偽' => [
                new MonthDay(12,14),
                new MonthDay(12,15),
                new MonthDay(1,15),
                false,
            ],
            '年越ししないかつ真' => [
                new MonthDay(6,10),
                new MonthDay(6,10),
                new MonthDay(6,20),
                true,
            ],
            '年越ししないかつ偽' => [
                new MonthDay(6,21),
                new MonthDay(6,10),
                new MonthDay(6,20),
                false,
            ],
        ];
    }
}
