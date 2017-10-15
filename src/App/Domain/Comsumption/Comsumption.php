<?php


namespace Linkita\App\Domain\Compsumption;


class Comsumption
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
    private $kWh;

    /**
     * Comsumption constructor.
     * @param string $range
     * @param float $kWh
     */
    public function __construct(
        string $range,
        float $kWh
    ){
        $this->range = $range;
        $this->kWh = $kWh;
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

    /**
     * @return float
     */
    public function kWh(): float
    {
        return $this->kWh;
    }

    /**
     * @param float $kWh
     */
    public function setKwh(float $kWh)
    {
        $this->kWh = $kWh;
    }
}
