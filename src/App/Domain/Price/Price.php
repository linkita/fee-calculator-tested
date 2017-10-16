<?php

namespace Linkita\App\Domain\Price;

use Linkita\App\Domain\Product\Product;
use Linkita\App\Domain\PaymentMode\PaymentMode;
use Linkita\App\Domain\Tariff\Tariff;

class Price
{
    /**
     * @var Product
     */
    private $product;
    /**
     * @var PaymentMode
     */
    private $paymentMode;
    /**
     * @var Tariff
     */
    private $tariff;
    /**
     * @var float
     */
    private $period1Price;
    /**
     * @var float
     */
    private $period2Price;
    /**
     * @var float
     */
    private $powerPrice;

    /**
     * Price constructor.
     * @param Product $product
     * @param PaymentMode $paymentMode
     * @param Tariff $tariff
     * @param float $period1
     * @param float $period2
     * @param float $power
     */
    public function __construct(
        Product $product,
        PaymentMode $paymentMode,
        Tariff $tariff,
        float $period1,
        float $period2,
        float $power
    ){
        $this->product = $product;
        $this->paymentMode = $paymentMode;
        $this->tariff = $tariff;
        $this->period1Price = $period1;
        $this->period2Price = $period2;
        $this->powerPrice = $power;
    }

    /**
     * @return Product
     */
    public function product(): Product
    {
        return $this->product;
    }

    /**
     * @param Product $product
     */
    public function setProduct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * @return PaymentMode
     */
    public function paymentMode(): PaymentMode
    {
        return $this->paymentMode;
    }

    /**
     * @param PaymentMode $paymentMode
     */
    public function setPaymentMode(PaymentMode $paymentMode)
    {
        $this->paymentMode = $paymentMode;
    }

    /**
     * @return Tariff
     */
    public function tariff(): Tariff
    {
        return $this->tariff;
    }

    /**
     * @param Tariff $tariff
     */
    public function setTariff(Tariff $tariff)
    {
        $this->tariff = $tariff;
    }

    /**
     * @return float
     */
    public function period1Price(): float
    {
        return $this->period1Price;
    }

    /**
     * @param float $period1
     */
    public function setPeriod1(float $period1)
    {
        $this->period1Price = $period1;
    }

    /**
     * @return float
     */
    public function period2Price(): float
    {
        return $this->period2Price;
    }

    /**
     * @param float $period2
     */
    public function setPeriod2(float $period2)
    {
        $this->period2Price = $period2;
    }

    /**
     * @return float
     */
    public function powerPrice(): float
    {
        return $this->powerPrice;
    }

    /**
     * @param float $energy
     */
    public function setEnergy(float $energy)
    {
        $this->energy = $energy;
    }
}
