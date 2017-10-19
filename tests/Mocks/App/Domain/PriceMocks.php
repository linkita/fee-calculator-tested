<?php


namespace Linkita\Tests\Mocks\App\Domain;


use Linkita\App\Domain\Price\Price;
use Prophecy\Prophecy\ObjectProphecy;

class PriceMocks
{
    private const PERIOD_1_PRICE = 0.013;
    private const PERIOD_2_PRICE = 0.011;
    private const POWER_PRICE    = 4.1;

    /** @var Price|ObjectProphecy */
    private $prophet;

    public function __construct(ObjectProphecy $prophet)
    {
        $this->prophet = $prophet;
    }

    /**
     * @return Price|ObjectProphecy
     */
    public function basic()
    {
        $this->prophet->period1Price()->willReturn(self::PERIOD_1_PRICE);
        $this->prophet->period2Price()->willReturn(self::PERIOD_2_PRICE);
        $this->prophet->powerPrice()->willReturn(self::POWER_PRICE);

        return $this->prophet;
    }
    /**
     * @return Price
     */
    public function build(): Price
    {
        return $this->basic()->reveal();
    }

}
