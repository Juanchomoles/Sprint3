<?php
declare(strict_types=1);

namespace App\Helper\Exception;

use Exception;

class RecordNotFoundException extends Exception
{
    public function __construct($message, $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}