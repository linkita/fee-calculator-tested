<?php

namespace Linkita\Tests\Mocks\App\Domain\Consumption;

use Linkita\App\Domain\Consumption\Consumption;
use Linkita\App\Domain\Consumption\ConsumptionRepositoryInterface;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Prophecy\Prophecy\ObjectProphecy;

class ConsumptionRepositoryMocks extends TestCase
{
    /** @var ConsumptionRepositoryMocks|ObjectProphecy */
    private $prophet;

    public function __construct(ObjectProphecy $prophet)
    {
        $this->prophet = $prophet;
    }

    /**
     * @return ConsumptionRepositoryMocks|ObjectProphecy
     */
    public function basic()
    {
        $paymentModeMocks = new ConsumptionMocks($this->prophesize(Consumption::class));
        $paymentMode = $paymentModeMocks->basic()->build();

        $this->prophet->getConsumptionByRangeOrFail(Argument::any())->shouldBeCalled()->willReturn($paymentMode);

        return $this;
    }

    /**
     * @return ConsumptionRepositoryInterface
     */
    public function build(): ConsumptionRepositoryInterface
    {
        return $this->prophet->reveal();
    }
}
