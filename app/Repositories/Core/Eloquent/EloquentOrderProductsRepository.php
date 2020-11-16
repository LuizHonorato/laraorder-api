<?php


namespace App\Repositories\Core\Eloquent;


use App\Models\OrderProduct;
use App\Repositories\Contracts\OrderProductsRepositoryInterface;
use App\Repositories\Core\BaseEloquentRepository;

class EloquentOrderProductsRepository extends BaseEloquentRepository implements OrderProductsRepositoryInterface
{
    public function entity()
    {
        return OrderProduct::class;
    }
}
