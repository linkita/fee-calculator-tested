<?php

namespace Linkita\Tests\Mocks\App\Domain\Power;

use Linkita\App\Domain\Power\Power;
use PHPUnit\Framework\TestCase;
use Prophecy\Prophecy\ObjectProphecy;

class PowerMocks extends TestCase
{
    private const DEFAULT_POWER = 3.4;


    /** @var PowerMocks|ObjectProphecy */
    private $prophet;

    public function __construct(ObjectProphecy $prophet)
    {
        $this->prophet = $prophet;
    }

    /**
     * @return PowerMocks|ObjectProphecy
     */
    public function basic()
    {
        $this->prophet->kWh()->willReturn(self::DEFAULT_POWER);

        return $this;
    }

    /**
     * @return Power
     */
    public function build(): Power
    {
        return $this->prophet->reveal();
    }

}
