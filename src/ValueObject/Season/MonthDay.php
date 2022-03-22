<?php

declare(strict_types=1);

namespace JrPriceDomain\ValueObject\Season;

class MonthDay
{
    public function __construct(private int $month, private int $day)
    {
        // この検証方法では2/31など、実際に存在しない日も許容してしまう。
        // ただ今回の業務ロジックとは関係ないので、無視して実装する。
        if (!(1 <= $this->month && $this->month <= 12)) {
            throw new \InvalidArgumentException("Month is specified from 1 to 12 : {$this->month}");
        }

        if (!(1 <= $this->day && $this->day <= 31)) {
            throw new \InvalidArgumentException("Day is specified from 1 to 31 : {$this->day}");
        }
    }

    public function getMonth(): int
    {
        return $this->month;
    }

    public function getDay(): int
    {
        return $this->day;
    }

    public function isBetween(self $start, self $end): bool
    {
        // 年を越すか越さないかで判定ロジックが異なる
        if (self::smallEqual($start, $end)) {
            // 年を越さない場合(例:6/10 ~ 6/24)
            // 純粋に 6/10 <= $this <= 6/24 であることを検証する
            return self::smallEqual($start, $this) && self::smallEqual($this, $end);
        }

        // 年を越す場合(例:12/15 ~ 1/15)
        // 12/15 <= $this <= 12/31 または 1/1 <= $this <= 1/15であるかを検証する
        return
            (self::smallEqual($start, $this) && self::smallEqual($start, new self(12, 31)))
            || (self::smallEqual(new self(1, 1), $end) && self::smallEqual($this, $end));
    }

    /**
     * $a <= $b.
     *
     * 年越しを考慮できないので注意
     *
     * @param MonthDay $left
     * @param MonthDay $right
     */
    public static function smallEqual(self $left, self $right): bool
    {
        return $left->month !== $right->month ?
            // 同月でなければ小なりで比較
            // 例) 9月 < 10月 true
            $left->month < $right->month :

            // 同月であれば日を小なりイコールで比較
            // 9/10 <= 9/11 true
            $left->day <= $right->day;
    }
}
