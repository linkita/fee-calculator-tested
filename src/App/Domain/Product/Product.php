<?php

namespace Linkita\App\Domain\Product;


class Product
{
    public const UNIQUE_PERIOD = 'H';
    public const TWO_PERIODS = 'DH';

    /**
     * @var string
     */
    private $period;

    /**
     * PaymentMode constructor.
     * @param string $period
     */
    public function __construct(string $period)
    {
        $this->period = $period;
    }

    /**
     * @return string
     */
    public function period(): string
    {
        return $this->period;
    }

    public function isUniquePeriod(): bool
    {
        return $this->period === self::UNIQUE_PERIOD;
    }

    public function isTwoPeriod(): bool
    {
        return $this->period === self::TWO_PERIODS;
    }

    static public function isValidPeriod(string $period): bool
    {
        return $period === self::UNIQUE_PERIOD || $period === self::TWO_PERIODS;
    }
}
