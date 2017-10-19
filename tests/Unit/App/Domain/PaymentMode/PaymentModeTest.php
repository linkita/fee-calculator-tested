<?php

namespace Linkita\Tests\Unit\App\Domain\PaymentMode;

use Linkita\App\Domain\PaymentMode\PaymentMode;
use Linkita\App\Domain\PaymentMode\PaymentModeNotValidException;
use PHPUnit\Framework\TestCase;

class PaymentModeTest extends TestCase
{

    public function testWhenPrepaymentIsGivenShouldBeReturnValidEntity()
    {
        $paymentMode = new PaymentMode('prepayment');

        $this->assertTrue($paymentMode->isPrepayment());
        $this->assertFalse($paymentMode->isPostpayment());
        $this->assertEquals($paymentMode->mode(), 'prepayment');
    }

    public function testWhenPostpaymentIsGivenShouldBeReturnValidEntity()
    {
        $paymentMode = new PaymentMode('postpayment');

        $this->assertInstanceOf(PaymentMode::class, $paymentMode);
    }

    public function testWhenInvalidValueIsGivenShouldBeThrowException()
    {
        /* Ey! The assert exception always first of the call to test */
        $this->expectException(PaymentModeNotValidException::class);

        $a = new PaymentMode('nopayment');

    }

}
