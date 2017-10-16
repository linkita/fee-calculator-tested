<?php


namespace Linkita\App\Domain\Consumption;


class Consumption
{
    public const LOW = 'flat';
    public const MEDIUM = 'house';
    public const HIGH = 'castle';

    /**
     * @var string
     */
    private $range;
    /**
     * @var float
     */
    private $p1;
    /**
     * @var float
     */
    private $p2;


    /**
     * Consumption constructor.
     * @param string $range
     * @param float $p1
     * @param float $p2
     */
    public function __construct(
        string $range,
        float $p1,
        float $p2
    ){
        $this->range = $range;
        $this->p1 = $p1;
        $this->p2 = $p2;
    }

    /**
     * @return float
     */
    public function p1(): float
    {
        return $this->p1;
    }

    /**
     * @return float
     */
    public function p2(): float
    {
        return $this->p2;
    }

    /**
     * @return string
     */
    public function range(): string
    {
        return $this->range;
    }

    /**
     * @param string $range
     */
    public function setRange(string $range)
    {
        $this->range = $range;
    }


    static public function isValidRange(string $range): bool
    {
        return $range === self::LOW || $range === self::MEDIUM || $range === self::HIGH;
    }

}
