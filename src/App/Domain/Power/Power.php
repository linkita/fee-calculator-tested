<?php


namespace Linkita\App\Domain\Power;


class Power
{
    /**
     * @var float
     */
    private $kWh;

    /**
     * Power constructor. Always kWh
     * @param float $kWh
     */
    public function __construct(float $kWh)
    {
        $this->kWh = $kWh;
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
    public function setKWh(float $kWh)
    {
        $this->kWh = $kWh;
    }
}
