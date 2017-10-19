<?php


namespace Linkita\Tests\Mocks\App\Domain;


use Linkita\App\Domain\Money;
use PHPUnit\Framework\TestCase;

class MoneyMocks extends TestCase
{
    /**
     * @var TestCase
     */
    private $testCase;

    public function __construct(TestCase $testCase)
    {
        $this->testCase = $testCase;
    }

    public function basic()
    {
        return $this->testCase
            ->getMockBuilder(Money::class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function eur(float $amount = 42)
    {
        $mock = $this->basic();
        $mock
            ->expects($this->any())
            ->method('amount')
            ->willReturn($amount);
        $mock
            ->expects($this->any())
            ->method('currency')
            ->willReturn(Money::EUR);

        return $mock;
    }
}
