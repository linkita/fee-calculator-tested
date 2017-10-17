<?php

namespace Linkita\App\Domain\Tariff;


interface TariffRepositoryInterface
{
    public function getTariffByPower(float $power) : Tariff;
}
