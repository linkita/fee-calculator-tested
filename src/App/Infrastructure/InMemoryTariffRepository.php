<?php


namespace Linkita\App\Infrastructure;


use Linkita\App\Domain\Tariff\Tariff;
use Linkita\App\Domain\Tariff\TariffRepositoryInterface;

class InMemoryTariffRepository implements TariffRepositoryInterface
{

    public function getTariffByPower(float $power): Tariff
    {
        return new Tariff(Tariff::TWO);
    }
}
