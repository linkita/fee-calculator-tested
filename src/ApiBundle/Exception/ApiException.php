<?php

namespace Linkita\ApiBundle\Exception;

use Exception;
use Throwable;

class ApiException extends Exception
{
    public static function fromException(Throwable $throwable)
    {
        return new static($throwable->getMessage(), $throwable->getCode());
    }
}