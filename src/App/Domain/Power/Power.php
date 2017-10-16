<?php


namespace Linkita\App\Domain\Power;


class Power
{
    /**
     * @var float
     */
    private $kWh;

    /**
     * @var string
     */
    private $unit;

    /**
     * Power constructor. Always kWh
     * @param float $kWh
     */
    public function __construct(float $kWh)
    {
        $this->kWh = $kWh;
        $this->unit = 'Kwh';
    }

    /**
     * @return float
     */
    public function kWh(): float
    {
        return $this->kWh;
    }

    /**
     * @return string
     */
    public function unit(): string
    {
        return $this->unit;
    }
}
