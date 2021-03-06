<?php

namespace XRPHP\Exception;

/**
 * An exception for parameter validation errors.
 *
 * @package XRPHP\Exception
 */
class InvalidParameterException extends XRPHPException
{
    // Require a message in the constructor.
    public function __construct($message, $code = 0, XRPHPException $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
