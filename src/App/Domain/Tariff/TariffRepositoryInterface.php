<?php

namespace Linkita\App\Domain\Tariff;


interface TariffRepositoryInterface
{
    public function getTariffByPower(string $power) : string;
}
