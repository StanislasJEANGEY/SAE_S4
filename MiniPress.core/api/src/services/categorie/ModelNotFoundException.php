<?php

namespace minipress\services\categorie;

use PHPUnit\Framework\Exception;

class ModelNotFoundException extends Exception
{
    public function __construct($message = "", $code = 0, Exception $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}