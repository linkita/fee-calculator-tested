<?php


namespace Linkita\Tests\Mocks\App\Domain\PaymentMode;


use Linkita\App\Domain\PaymentMode\PaymentMode;
use Linkita\App\Domain\PaymentMode\PaymentModeRepositoryInterface;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Prophecy\Prophecy\ObjectProphecy;

class PaymentModeRepositoryMocks extends TestCase
{

    /** @var PaymentModeRepositoryMocks|ObjectProphecy */
    private $prophet;

    public function __construct(ObjectProphecy $prophet)
    {
        $this->prophet = $prophet;
    }

    /**
     * @return PaymentModeRepositoryMocks|ObjectProphecy
     */
    public function basic()
    {
        $paymentModeMocks = new PaymentModeMocks($this->prophesize(PaymentMode::class));
        $paymentMode = $paymentModeMocks->basicPrePayment()->build();

        $this->prophet->getPaymentModeOrFail(Argument::any())->shouldBeCalled()->willReturn($paymentMode);

        return $this;
    }

    /**
     * @return PaymentModeRepositoryInterface
     */
    public function build(): PaymentModeRepositoryInterface
    {
        return $this->prophet->reveal();
    }

}
