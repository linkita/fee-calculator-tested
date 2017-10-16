<?php


namespace Linkita\App\Domain\Consumption;


interface ConsumptionRepositoryInterface
{
    public function getConsumptionByRangeOrFail(string $range) : Consumption;
}
