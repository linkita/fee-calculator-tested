<?php


namespace Linkita\App\Domain\PaymentMode;


class PaymentMode
{
    public const MODE_PREPAYMENT = 'Prepayment';
    public const MODE_POSTPAYMENT = 'Postpayment';

    /**
     * @var string
     */
    private $mode;

    /**
     * PaymentMode constructor.
     * @param string $mode
     */
    public function __construct(string $mode)
    {
        $this->mode = $mode;
    }

    /**
     * @return string
     */
    public function mode(): string
    {
        return $this->mode;
    }

    public function isPrepayment(): bool
    {
        return $this->mode === self::MODE_PREPAYMENT;
    }

    public function isPostpayment(): bool
    {
        return $this->mode === self::MODE_POSTPAYMENT;
    }

    static public function isValidMode(string $mode): bool
    {
        return $mode === self::MODE_PREPAYMENT || $mode === self::MODE_POSTPAYMENT;
    }
}
