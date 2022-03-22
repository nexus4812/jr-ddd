<?php

declare(strict_types=1);

namespace JrPriceDomain\ValueObject\Abstract;

use JrPriceDomain\ValueObject\ValueObject;

/**
 * Class Enum.
 *
 * @template T of string|int
 */
abstract class Enum implements ValueObject
{
    /**
     * @var T
     */
    private int|string $value;

    /**
     * @param T $value
     *
     * @throws \UnexpectedValueException
     */
    final public function __construct(int|string $value)
    {
        static::assertValidValue($value);
        $this->value = $value;
    }

    /**
     * @param static $variable
     */
    final public function equal(self $variable): bool
    {
        return $this->value() === $variable->value();
    }

    /**
     * @param T $value
     */
    final public function valueEqual(int|string $value): bool
    {
        static::assertValidValue($value);

        return $this->value() === $value;
    }

    /**
     * @param T $value
     *
     * @return static<T>
     */
    final public static function from(int|string $value): self
    {
        static::assertValidValue($value);

        return new static($value);
    }

    /**
     * @return T
     */
    public function value(): int|string
    {
        return $this->value;
    }

    protected static function search(int|string $value): ?string
    {
        $r = \array_search($value, static::toArray(), true);

        return is_string($r) ? $r : null;
    }

    /**
     * @return array<string, mixed>
     */
    protected static function toArray(): array
    {
        return (new \ReflectionClass(static::class))->getConstants();
    }

    /**
     * @param T $value
     */
    protected static function assertValidValue(int|string $value): void
    {
        if (is_null(static::search($value))) {
            throw new \UnexpectedValueException("Value '{$value}' is not part of the enum ".static::class);
        }
    }
}
