<?php

namespace Linkita\Tests\Mocks\App\Domain\Power;

use Linkita\App\Domain\Power\Power;
use Linkita\App\Domain\Power\PowerRepositoryInterface;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Prophecy\Prophecy\ObjectProphecy;

class PowerRepositoryMocks extends TestCase
{
    /** @var PowerRepositoryInterface|ObjectProphecy */
    private $prophet;

    public function __construct(ObjectProphecy $prophet)
    {
        $this->prophet = $prophet;
    }

    /**
     * @return PowerRepositoryMocks|ObjectProphecy
     */
    public function basic()
    {
        $powerMocks = new PowerMocks($this->prophesize(Power::class));
        $power = $powerMocks->basic();
        
        $this->prophet->getNormalizedPowerOrFail(Argument::any())->shouldBeCalled(1)->willReturn($power->build());

        return $this;
    }

    /**
     * @return PowerRepositoryInterface
     */
    public function build(): PowerRepositoryInterface
    {
        return $this->prophet->reveal();
    }

}
