<?php

namespace Linkita\App\Infrastructure;

use Linkita\App\Domain\Price;
use Linkita\App\Domain\Price\PriceRepositoryInterface;

class InMemoryPriceRepository implements  PriceRepositoryInterface
{

    /**
     * InMemoryPriceRepository constructor.
     */
    public function __construct()
    {
        $this->prices = [
            new Price()
        ];
    }
}
