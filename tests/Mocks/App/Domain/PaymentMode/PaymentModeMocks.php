<?php

namespace Linkita\Tests\Mocks\App\Domain\PaymentMode;


use Linkita\App\Domain\PaymentMode\PaymentMode;
use Prophecy\Prophecy\ObjectProphecy;

class PaymentModeMocks
{

    private const MODE_PREPAYMENT = 'prepayment';
    private const MODE_POSTPAYMENT = 'postpayment';

    /** @var PaymentMode |ObjectProphecy */
    private $prophet;

    public function __construct(ObjectProphecy $prophet)
    {
        $this->prophet = $prophet;
    }

    /**
     * @return PaymentModeMocks
     */
    public function basicPrePayment()
    {
        $this->prophet->mode()->willReturn(self::MODE_PREPAYMENT);

        return $this;
    }

    /**
     * @return PaymentModeMocks
     */
    public function basicPostPayment()
    {
        $this->prophet->mode()->willReturn(self::MODE_POSTPAYMENT);

        return $this;
    }

    /**
     * @return PaymentMode
     */
    public function build(): PaymentMode
    {
        return $this->prophet->reveal();
    }
}
