<?php

namespace Linkita\App\Application;


use Linkita\App\Domain\FeeCalculator;
use Linkita\App\Domain\Tariff\Tariff;
use Linkita\App\Domain\Tariff\TariffRepositoryInterface;

class CalculateFee
{
    /**
     * @var FeeCalculator
     */
    private $feeCalculator;
    /**
     * @var TariffRepositoryInterface
     */
    private $tariffRepository;

    /**
     * CalculateFee constructor.
     * @param FeeCalculator $feeCalculator
     * @param TariffRepositoryInterface $tariffRepository
     */
    public function __construct(
        FeeCalculator $feeCalculator,
        TariffRepositoryInterface $tariffRepository
    ) {
        $this->feeCalculator = $feeCalculator;
        $this->tariffRepository = $tariffRepository;
    }

    public function execute(CalculateFeeRequest $request)
    {
        return $this->feeCalculator->calculate(
            $request->product(),
            $request->paymentMode(),
            $request->consumption(),
            $request->power(),
            $this->getTariff($request->power())
        );
    }

    private function getTariff(string $power) : Tariff
    {
        return $this->tariffRepository->getTariffByPower(floatval($power));
    }


}
