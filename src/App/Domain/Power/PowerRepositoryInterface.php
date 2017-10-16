<?php


namespace Linkita\App\Domain\Power;


interface PowerRepositoryInterface
{
    public function getNormalizedPowerOrFail(float $normalizedPower) : Power;
}
