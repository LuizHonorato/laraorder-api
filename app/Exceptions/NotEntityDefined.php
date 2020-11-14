<?php


namespace App\Exceptions;

use Exception;

class NotEntityDefined extends Exception
{
    public function render()
    {
        return response()->json(['error' => 'The entity was not defined.'], 500);
    }
}
