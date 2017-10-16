<?php


use Linkita\App\Domain\Consumption\Consumption;
use Linkita\App\Domain\Consumption\ConsumptionRepositoryInterface;
use Linkita\App\Domain\FeeCalculator;
use Linkita\App\Domain\Money;
use Linkita\App\Domain\PaymentMode\PaymentMode;
use Linkita\App\Domain\PaymentMode\PaymentModeRepositoryInterface;
use Linkita\App\Domain\Power\Power;
use Linkita\App\Domain\Power\PowerRepositoryInterface;
use Linkita\App\Domain\Price\Price;
use Linkita\App\Domain\Price\PriceRepositoryInterface;
use Linkita\App\Domain\Product\Product;
use Linkita\App\Domain\Product\ProductRepositoryInterface;
use Linkita\App\Domain\Tariff\Tariff;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;

class FeeCalculatorTest extends TestCase
{
    /**
     * Happy path
     */
    public function testCalculateFeeWithValidParametersReturnsValidFee()
    {

        $product = $this->prophesize(Product::class);
        $product->period()->willReturn('H');
        $product->isTwoPeriod()->willReturn(false);

        $productRepository = $this->prophesize(ProductRepositoryInterface::class);
        $productRepository->getProductOrFail(Argument::any())->shouldBeCalled()->willReturn($product->reveal());

        $paymentMode = $this->prophesize(PaymentMode::class);
        $paymentMode->mode()->willReturn('prepayment');

        $paymentModeRepository = $this->prophesize(PaymentModeRepositoryInterface::class);
        $paymentModeRepository->getPaymentModeOrFail(Argument::any())->shouldBeCalled()->willReturn($paymentMode->reveal());

        $power = $this->prophesize(Power::class );
        $power->kWh()->willReturn(3.4);

        $powerRepository = $this->prophesize(PowerRepositoryInterface::class);
        $powerRepository->getNormalizedPowerOrFail(Argument::any())->shouldBeCalled()->willReturn($power->reveal());

        $consumption = $this->prophesize(Consumption::class);
        $consumption->p1()->willReturn(1024);
        $consumption->p2()->willReturn(500);

        $consumptionRepository = $this->prophesize(ConsumptionRepositoryInterface::class);
        $consumptionRepository->getConsumptionByRangeOrFail(Argument::any())->shouldBeCalled()->willReturn($consumption->reveal());

        $price = $this->prophesize(Price::class);
        $price->period1Price()->willReturn(0.013);
        $price->period2Price()->willReturn(0.011);
        $price->powerPrice()->willReturn(4.1);

        $priceRepository = $this->prophesize(PriceRepositoryInterface::class);
        $priceRepository->byProductAndTariffAndPaymentModeOrFail(Argument::any(), Argument::any(), Argument::any())->shouldBeCalled()->willReturn($price->reveal());

        $tariff = $this->prophesize(Tariff::class);


        $feeCalculator = new FeeCalculator(
            $productRepository->reveal(),
            $paymentModeRepository->reveal(),
            $powerRepository->reveal(),
            $consumptionRepository->reveal(),
            $priceRepository->reveal()
        );

        $money = $feeCalculator->calculate(
          'H',
          'prepayment',
          'flat',
            3.4,
            $tariff->reveal()
        );

        $expectedMoney = new Money(47.0, '€');
        $this->assertEquals($expectedMoney, $money);


    }

}
