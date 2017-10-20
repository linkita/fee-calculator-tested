<?php

namespace Linkita\Tests\Mocks\App\Domain\Tariff;

use Linkita\App\Domain\Tariff\Tariff;
use PHPUnit\Framework\TestCase;

class TariffMocks extends TestCase
{
    /**
     * @var TestCase
     */
    private $testCase;

    public function __construct(TestCase $testCase)
    {
        $this->testCase = $testCase;
    }

    public function basic() : Tariff
    {
        return $this->testCase
            ->getMockBuilder(Tariff::class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function getOne()
    {
        $mock = $this->basic();
        $mock
            ->expects($this->any())
            ->method('tariff')
            ->willReturn(Tariff::ONE);

        return $mock;
    }

    public function getTwo()
    {
        $mock = $this->basic();
        $mock
            ->expects($this->any())
            ->method('tariff')
            ->willReturn(Tariff::TWO);

        return $mock;
    }
}
