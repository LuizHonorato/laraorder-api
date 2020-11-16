<?php


namespace App\Exceptions;
use Exception;

class NotOrderQuantityEnough extends Exception
{
    public function render($request)
    {
        return response()->json(['error' => 'The product ' . $request['products'][0]['product'] . ' has no minimum order quantity.'], 404);
    }
}
