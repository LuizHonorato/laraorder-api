<?php


namespace App\Exceptions;
use Exception;

class NotPriceProvided extends Exception
{
    public function render($request)
    {
        return response()->json(['error' => 'The price of product ' . $request['products'][0]['product'] . ' has no a minimum value.'], 404);
    }
}
