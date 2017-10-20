<?php

namespace Linkita\Tests\Mocks\App\Domain\Tariff;

use Linkita\App\Domain\Tariff\TariffRepositoryInterface;
use PHPUnit\Framework\TestCase;
use \Mockery as m;

/**
 * Mockery example
 */
class TariffRepositoryMocks extends TestCase
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
            ->getMockBuilder(TariffRepositoryInterface::class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    /**
     * @return TariffRepositoryInterface
     */
    public function getTariffOne()
    {
        $tariffOneMock = new TariffMocks($this->testCase);

        $mock = $this->basic();
        $mock
            ->expects($this->any())
            ->method('getTariffByPower')
            ->willReturn($tariffOneMock->getOne());

        return $mock;
    }
}
