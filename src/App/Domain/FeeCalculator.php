<?php

namespace Linkita\App\Domain;

use Linkita\App\Domain\Consumption\Consumption;
use Linkita\App\Domain\Consumption\ConsumptionRepositoryInterface;
use Linkita\App\Domain\PaymentMode\PaymentModeRepositoryInterface;
use Linkita\App\Domain\Power\Power;
use Linkita\App\Domain\Power\PowerRepositoryInterface;
use Linkita\App\Domain\Price\Price;
use Linkita\App\Domain\Price\PriceRepositoryInterface;
use Linkita\App\Domain\Product\Product;
use Linkita\App\Domain\Product\ProductRepositoryInterface;
use Linkita\App\Domain\Tariff\Tariff;

class FeeCalculator
{
    const DEFAULT_METER_COST = 9.8;
    const ADJUSTMENT_RATE = 1.05113;
    const ELECTRICITY_TAX = 4.864;
    const VAT = 21;

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;
    /**
     * @var PaymentModeRepositoryInterface
     */
    private $paymentModeRepository;
    /**
     * @var PriceRepositoryInterface
     */
    private $priceRepository;
    /**
     * @var PowerRepositoryInterface
     */
    private $powerRepository;
    /**
     * @var ConsumptionRepositoryInterface
     */
    private $consumptionRepository;

    /**
     * FeeCalculator constructor.
     * @param ProductRepositoryInterface $productRepository
     * @param PaymentModeRepositoryInterface $paymentModeRepository
     * @param PowerRepositoryInterface $powerRepository
     * @param ConsumptionRepositoryInterface $consumptionRepository
     * @param PriceRepositoryInterface $priceRepository
     */
    public function __construct(
        ProductRepositoryInterface $productRepository,
        PaymentModeRepositoryInterface $paymentModeRepository,
        PowerRepositoryInterface $powerRepository,
        ConsumptionRepositoryInterface $consumptionRepository,
        PriceRepositoryInterface $priceRepository

    ) {
        $this->productRepository = $productRepository;
        $this->paymentModeRepository = $paymentModeRepository;
        $this->powerRepository = $powerRepository;
        $this->consumptionRepository = $consumptionRepository;
        $this->priceRepository = $priceRepository;
    }

    /**
     * @param string $productId
     * @param string $paymentMode
     * @param string $rangeConsumption
     * @param string $power
     * @param Tariff $tariff
     * @return Money
     */
    public function calculate(
        string $productId,
        string $paymentMode,
        string $rangeConsumption,
        string  $power,
        Tariff $tariff
    ) : Money {

        $consumption = $this->consumptionRepository->getConsumptionByRangeOrFail($rangeConsumption);
        $normalizedPower = $this->powerRepository->getNormalizedPowerOrFail($power);
        $product = $this->productRepository->getProductOrFail($productId);

        $prices = $this->priceRepository->byProductAndTariffAndPaymentModeOrFail(
            $product,
            $tariff,
            $this->paymentModeRepository->getPaymentModeOrFail($paymentMode)
        );

        $subtotal = $this->calculateConsumptionPrice($prices, $consumption, $product) +
                 $this->calculatePowerPrice($prices, $normalizedPower);


        $subtotal += ($subtotal * self::ADJUSTMENT_RATE * self::ELECTRICITY_TAX) / 100;
        $subtotal += self::DEFAULT_METER_COST;
        $total = $subtotal * (1 + (self::VAT / 100));

        return new Money(round($total), '€');
    }

    /**
     * @param Price $prices
     * @param Consumption $consumption
     * @param Product $product
     * @return float
     */
    private function calculateConsumptionPrice(Price $prices, Consumption $consumption, Product $product) : float
    {
        $priceConsumption = $consumption->p1() * $prices->period1Price();
        if ($product->isTwoPeriod()) {
            $priceConsumption =+ $consumption->p2() * $prices->period2Price();
        }

        return $priceConsumption;
    }

    /**
     * @param Price $prices
     * @param Power $power
     * @return float
     */
    private function calculatePowerPrice(Price $prices, Power $power)
    {
        return $power->kWh() * $prices->powerPrice();
    }

}
