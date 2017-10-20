<?php


namespace Linkita\Tests\Unit\App\Application;


use Linkita\App\Application\CalculateFee;
use Linkita\App\Domain\Money;
use Linkita\Tests\Mocks\App\Application\CalculateFeeRequestMocks;
use Linkita\Tests\Mocks\App\Domain\FeeCalculatorMocks;
use Linkita\Tests\Mocks\App\Domain\Tariff\TariffRepositoryMocks;
use PHPUnit\Framework\TestCase;

class CalculateFeeTest extends TestCase
{

    public function testValidCalculateFeeRequestReturnFeeAsMoney()
    {
        $feeCalculatorMock = new FeeCalculatorMocks($this);
        $tariffRepositoryMock = new TariffRepositoryMocks($this);
        $calculateFeeRequestMock = new CalculateFeeRequestMocks($this);


        $calculateFee = new CalculateFee(
            $feeCalculatorMock->getMoney42(),
            $tariffRepositoryMock->getTariffOne()
        );

        $money = $calculateFee->execute($calculateFeeRequestMock->complete());

        $this->assertEquals($money->amount(), 42);
        $this->assertEquals($money->currency(), Money::EUR);
    }
}
