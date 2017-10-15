<?php

namespace Linkita\App\Aplication;


class CalculateFeeRequest
{
    /**
     * @var string
     */
    private $productId;
    /**
     * @var string
     */
    private $paymentMode;
    /**
     * @var array
     */
    private $power;
    /**
     * @var string
     */
    private $comsumption;

    /**
     * CalculateFeeRequest constructor.
     * @param string $productId
     * @param string $paymentMode
     * @param array $power
     * @param string $comsumption
     */
    public function __construct(
        string $productId,
        string $paymentMode,
        array $power,
        string $comsumption
    ){
        $this->productId = $productId;
        $this->paymentMode = $paymentMode;
        $this->power = $power;
        $this->comsumption = $comsumption;
    }

    /**
     * @return string
     */
    public function productId(): string
    {
        return $this->productId;
    }

    /**
     * @return string
     */
    public function paymentMode(): string
    {
        return $this->paymentMode;
    }

    /**
     * @return array
     */
    public function power(): array
    {
        return $this->power;
    }

    /**
     * @return string
     */
    public function comsumption(): string
    {
        return $this->comsumption;
    }
}