<?php


namespace Linkita\Tests\Mocks\App\Domain\Product;


use Linkita\App\Domain\Product\Product;
use Linkita\App\Domain\Product\ProductRepositoryInterface;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Prophecy\Prophecy\ObjectProphecy;

class ProductRepositoryMocks extends TestCase
{

    /** @var ProductRepositoryInterface|ObjectProphecy */
    private $prophet;

    public function __construct(ObjectProphecy $prophet)
    {
        $this->prophet = $prophet;
    }

    /**
     * @return ProductRepositoryMocks|ObjectProphecy
     */
    public function basic()
    {
        $productMocks = new ProductMocks($this->prophesize(Product::class));
        $product = $productMocks->basic();


        $this->prophet->getProductOrFail(Argument::any())->shouldBeCalled()->willReturn($product->build());

        return $this;
    }

    /**
     * @return ProductRepositoryInterface
     */
    public function build(): ProductRepositoryInterface
    {
        return $this->prophet->reveal();
    }

}
