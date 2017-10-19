<?php

namespace Linkita\Tests\Mocks\App\Domain;

use Linkita\App\Domain\FeeCalculator;
use PHPUnit\Framework\TestCase;

class FeeCalculatorMocks extends TestCase
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
            ->getMockBuilder(FeeCalculator::class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    /**
     * @return FeeCalculator
     */
    public function getMoney()
    {
        $money = new MoneyMocks($this);

        $mock = $this->basic();
        $mock
            ->expects($this->any())
            ->method('calculate')
            ->willReturn($money->eur());

        return $mock;
    }
}
