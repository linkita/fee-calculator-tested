<?php

namespace Linkita\Tests\Mocks\App\Domain\Product;


use Linkita\App\Domain\Product\Product;
use Prophecy\Prophecy\ObjectProphecy;

class ProductMocks
{
    private const UNIQUE_PERIOD = 'H';


    /** @var Product|ObjectProphecy */
    private $prophet;

    public function __construct(ObjectProphecy $prophet)
    {
        $this->prophet = $prophet;
    }

    /**
     * @return ProductMocks|ObjectProphecy
     */
    public function basic()
    {
        $this->prophet->period()->willReturn(self::UNIQUE_PERIOD);
        $this->prophet->isTwoPeriod()->willReturn(false);

        return $this;
    }

    /**
     * @return Product
     */
    public function build(): Product
    {
        return $this->prophet->reveal();
    }

}
