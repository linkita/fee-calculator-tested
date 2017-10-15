<?php

namespace Linkita\App\Aplication;


use Linkita\App\Domain\FeeCalculator;
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
            $request->productId(),
            $request->paymentMode(),
            $request->power(),
            $this->getTariff($request->power()),
            $request->comsumption()
        );
    }

    private function getTariff($power)
    {
        return $this->tariffRepository->getTariffByPower($power);
    }


}
