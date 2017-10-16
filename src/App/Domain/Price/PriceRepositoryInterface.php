<?php


namespace Linkita\App\Domain\Price;


use Linkita\App\Domain\PaymentMode\PaymentMode;
use Linkita\App\Domain\Power\Power;
use Linkita\App\Domain\Product\Product;
use Linkita\App\Domain\Tariff\Tariff;

interface PriceRepositoryInterface
{
    public function byProductAndTariffAndPaymentModeOrFail(
        Product $product,
        Tariff $tariff,
        PaymentMode $paymentMode
    ) : Price;
}
