<?php

namespace Linkita\Tests\Mocks\App\Application;

use Linkita\App\Application\CalculateFeeRequest;
use PHPUnit\Framework\TestCase;

class CalculateFeeRequestMocks extends TestCase
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
            ->getMockBuilder(CalculateFeeRequest::class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    /**
     * @return CalculateFeeRequest
     */
    public function complete()
    {
        $mock = $this->basic();
        $mock
            ->expects($this->any())
            ->method('product')
            ->willReturn('DH');
        $mock
            ->expects($this->any())
            ->method('paymentMode')
            ->willReturn('prepayment');
        $mock
            ->expects($this->any())
            ->method('consumption')
            ->willReturn('flat');
        $mock
            ->expects($this->any())
            ->method('power')
            ->willReturn('3.4');

        return $mock;
    }

}
