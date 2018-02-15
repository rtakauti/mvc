<?php

namespace StudioVisual\Lib\Exceptions;

use LogicException;
use Exception;

/**
 * Class AcasalarException
 *
 * @package StudioVisual\Exceptions
 */
class AcasalarException extends LogicException
{
    public function __construct($message = "", $code = ACASALAR_CODE_1, Exception $previous = null)
    {
        $message = empty($message) ? ACASALAR_FAIL : $message;
        parent::__construct($message, $code, $previous);
    }

    public function __toString()
    {
        return "Code : [{$this->code}]  Mensagem de erro : {$this->message}\n";
    }
}