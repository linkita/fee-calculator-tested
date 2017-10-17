<?php

namespace Linkita\App\Application;


use InvalidArgumentException;
use Linkita\App\Domain\Power\Power;
use Linkita\App\Domain\Product\Product;
use Linkita\App\Domain\consumption\consumption;
use Linkita\App\Domain\PaymentMode\PaymentMode;

class CalculateFeeRequest
{
    /**
     * @var string
     */
    private $product;
    /**
     * @var string
     */
    private $paymentMode;
    /**
     * @var string
     */
    private $consumption;
    /**
     * @var float
     */
    private $power;

    /**
     * CalculateFeeRequest constructor.
     * @param string $product
     * @param string $paymentMode
     * @param string $consumption
     * @param string|null $power
     */
    public function __construct(
        ? string $product,
        ? string $paymentMode,
        ? string $consumption,
        ? string $power
    ){
        $this->product = $product;
        $this->paymentMode = $paymentMode;
        $this->consumption = $consumption;
        $this->power = $power;
        $this->validate();
    }

    private function validate()
    {
        $errors = [];

        if (!$this->product || !Product::isValidPeriod($this->product))
        {
            $errors[] = 'Invalid Product';
        }

        if (!$this->paymentMode || !PaymentMode::isValidMode($this->paymentMode))
        {
            $errors[] = 'Invalid Payment Modes';
        }

        if (!$this->consumption || !Consumption::isValidRange($this->consumption))
        {
            $errors[] = 'Invalid range of consumption';
        }

        if (!$this->power || !Power::isValidPower($this->power))
        {
            $errors[] = 'Invalid valid Power';
        }

        if (count($errors)) {
            throw new InvalidArgumentException('Invalid request: ' . join('. ', $errors));
        }
    }

    /**
     * @return string
     */
    public function product(): string
    {
        return $this->product;
    }

    /**
     * @return string
     */
    public function paymentMode(): string
    {
        return $this->paymentMode;
    }

    /**
     * @return string
     */
    public function power(): string
    {
        return $this->power;
    }

    /**
     * @return string
     */
    public function consumption(): string
    {
        return $this->consumption;
    }
}
