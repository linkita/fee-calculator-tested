<?php

namespace Linkita\Tests\Unit\App\Application;

use InvalidArgumentException;
use Linkita\App\Application\CalculateFeeRequest;
use PHPUnit\Framework\TestCase;

class CalculateFeeRequestTest extends TestCase
{
    /**
     * Happy Path
     */
    public function testRightValueGivenShouldBeReturnValidRequest()
    {
        $calculateFeeRequest = new CalculateFeeRequest(
            'DH',
            'prepayment',
            'castle',
            '3.4'
        );

        $this->assertEquals($calculateFeeRequest->product(), 'DH');
        $this->assertEquals($calculateFeeRequest->paymentMode(), 'prepayment');
        $this->assertEquals($calculateFeeRequest->consumption(), 'castle');
        $this->assertEquals($calculateFeeRequest->power(), '3.4');
    }


    public function testOneWrongValueGivenShouldFailWithErrors()
    {

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid request: Invalid Payment Modes');

        new CalculateFeeRequest(
            'DH',
            'willfail',
            'castle',
            '3.4'
        );
    }

    public function testAllWrongValueGivenShouldFailWithErrors()
    {
        /* Again :P The exception asserts always first of the call to test */
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid request: Invalid Product. Invalid Payment Modes. Invalid range of consumption. Invalid valid Power');

        new CalculateFeeRequest(
            'is42',
            'is42',
            'is42',
            'is42'
        );
    }

}
