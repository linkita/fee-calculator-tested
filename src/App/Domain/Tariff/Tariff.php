<?php


namespace Linkita\App\Domain\Tariff;


class Tariff
{

    public const ONE = '2.0';
    public const TWO = '2.1';

    /**
     * @var string
     */
    private $tariff;

    /**
     * Tariff constructor.
     * @param string $tariff
     */
    public function __construct(
        string $tariff
    ){
        $this->tariff = $tariff;
    }

    /**
     * @return string
     */
    public function tariff(): string
    {
        return $this->tariff;
    }

    /**
     * @param string $tariff
     * @return bool
     */
    static public function isValidTariff(string $tariff): bool
    {
        return $tariff === self::ONE || $tariff === self::TWO;
    }
}
