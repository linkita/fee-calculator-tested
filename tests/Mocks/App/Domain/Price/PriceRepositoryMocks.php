<?php


namespace Linkita\Tests\Mocks\App\Domain\Price;


use Linkita\App\Domain\Price\Price;
use Linkita\App\Domain\Price\PriceRepositoryInterface;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Prophecy\Prophecy\ObjectProphecy;

class PriceRepositoryMocks extends TestCase
{

    /** @var PriceRepositoryInterface|ObjectProphecy */
    private $prophet;

    public function __construct(ObjectProphecy $prophet)
    {
        $this->prophet = $prophet;
    }

    /**
     * @return PriceRepositoryMocks|ObjectProphecy
     */
    public function basic()
    {
        $powerMocks = new PriceMocks($this->prophesize(Price::class));
        $power = $powerMocks->basic();

        $this->prophet->byProductAndTariffAndPaymentModeOrFail(
            Argument::any(), Argument::any(), Argument::any())->shouldBeCalled(1)->willReturn($power->build()
        );

        return $this;
    }

    /**
     * @return PriceRepositoryInterface
     */
    public function build(): PriceRepositoryInterface
    {
        return $this->prophet->reveal();
    }
    
}
