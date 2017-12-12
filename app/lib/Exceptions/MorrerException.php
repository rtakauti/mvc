<?php

namespace StudioVisual\Lib\Exceptions;

use LogicException;
use Exception;

/**
 * Class MorrerException
 *
 * @package StudioVisual\Exceptions
 */
class MorrerException extends LogicException
{

    public function __construct($message = "", $code = MORRER_CODE_1, Exception $previous = null)
    {
        $message = empty($message) ? MORRER_FAIL : $message;
        parent::__construct($message, $code, $previous);
    }

    public function __toString()
    {
        return "Code : [{$this->code}]  Mensagem de erro : {$this->message}\n";
    }

}