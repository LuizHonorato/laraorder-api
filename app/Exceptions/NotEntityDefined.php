<?php


namespace App\Exceptions;

use Exception;

class NotEntityDefined extends Exception
{
    public function render()
    {
        return response()->json('The entity was not defined', 500);
    }
}
