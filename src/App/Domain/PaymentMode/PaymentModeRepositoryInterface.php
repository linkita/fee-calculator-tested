<?php


namespace Linkita\App\Domain\PaymentMode;


interface PaymentModeRepositoryInterface
{
    public function getPaymentModeOrFail(string $mode) : PaymentMode;
}
