<?php

namespace Linkita\Tests\Mocks\App\Domain\Consumption;

use Linkita\App\Domain\Consumption\Consumption;
use Prophecy\Prophecy\ObjectProphecy;

class ConsumptionMocks
{

    private const DEFAULT_P1 = 1024;
    private const DEFAULT_P2 = 500;


    /** @var ConsumptionMocks|ObjectProphecy */
    private $prophet;

    public function __construct(ObjectProphecy $prophet)
    {
        $this->prophet = $prophet;
    }

    /**
     * @return ConsumptionMocks|ObjectProphecy
     */
    public function basic()
    {
        $this->prophet->p1()->willReturn(self::DEFAULT_P1);
        $this->prophet->p2()->willReturn(self::DEFAULT_P2);

        return $this;
    }

    /**
     * @return Consumption
     */
    public function build(): Consumption
    {
        return $this->prophet->reveal();
    }

}
