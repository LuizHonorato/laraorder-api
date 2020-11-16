<?php


namespace App\Exceptions;
use Exception;

class NotDataProvided extends Exception
{
    public function render()
    {
        return response()->json(['error' => 'Not data provided to this operation.'], 404);
    }
}
