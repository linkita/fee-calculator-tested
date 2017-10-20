<?php

namespace Linkita\Tests\Unit\App\Domain;

use Linkita\App\Domain\Consumption\ConsumptionRepositoryInterface;
use Linkita\App\Domain\FeeCalculator;
use Linkita\App\Domain\Money;
use Linkita\App\Domain\PaymentMode\PaymentModeRepositoryInterface;
use Linkita\App\Domain\Power\PowerRepositoryInterface;
use Linkita\App\Domain\Price\Price;
use Linkita\App\Domain\Price\PriceRepositoryInterface;
use Linkita\App\Domain\Product\ProductRepositoryInterface;
use Linkita\Tests\Mocks\App\Domain\Consumption\ConsumptionRepositoryMocks;
use Linkita\Tests\Mocks\App\Domain\PaymentMode\PaymentModeRepositoryMocks;
use Linkita\Tests\Mocks\App\Domain\Power\PowerRepositoryMocks;
use Linkita\Tests\Mocks\App\Domain\Price\PriceMocks;
use Linkita\Tests\Mocks\App\Domain\Price\PriceRepositoryMocks;
use Linkita\Tests\Mocks\App\Domain\Product\ProductRepositoryMocks;
use Linkita\Tests\Mocks\App\Domain\Tariff\TariffMocks;
use PHPUnit\Framework\TestCase;

class FeeCalculatorTest extends TestCase
{
    private const UNIQUE_PERIOD = 'H';
    private const PREPAYMENT = 'prepayment';
    private const RANGE = 'flat';
    private const POWER = 3.4;

    /**
     * Happy path
     */
    public function testCalculateFeeWithValidParametersReturnsValidFee()
    {

        $productRepositoryMocks =
            new ProductRepositoryMocks($this->prophesize(ProductRepositoryInterface::class));
        $productRepository = $productRepositoryMocks->basic()->build();

        $paymentModeRepositoryMocks =
            new PaymentModeRepositoryMocks($this->prophesize(PaymentModeRepositoryInterface::class));
        $paymentModeRepository = $paymentModeRepositoryMocks->basic()->build();

        $powerRepositoryMocks =
            new PowerRepositoryMocks($this->prophesize(PowerRepositoryInterface::class));
        $powerRepository = $powerRepositoryMocks->basic()->build();

        $consumptionRepositoryMock =
            new ConsumptionRepositoryMocks($this->prophesize(ConsumptionRepositoryInterface::class));
        $consumptionRepository = $consumptionRepositoryMock->basic()->build();

        $priceRepositoryMock =
            new PriceRepositoryMocks($this->prophesize(PriceRepositoryInterface::class));
        $priceRepository = $priceRepositoryMock->basic()->build();
        

        $tariffMocks = new TariffMocks($this);
        $tariff = $tariffMocks->basic();

        $feeCalculator = new FeeCalculator(
            $productRepository,
            $paymentModeRepository,
            $powerRepository,
            $consumptionRepository,
            $priceRepository
        );

        $money = $feeCalculator->calculate(
          self::UNIQUE_PERIOD,
          self::PREPAYMENT,
          self::RANGE,
            self::POWER,
           $tariff
        );

        $expectedMoney = new Money(47.0, '€');
        $this->assertEquals($expectedMoney, $money);

    }

}
