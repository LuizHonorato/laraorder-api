<?php


namespace App\Repositories\Core\Eloquent;


use App\Models\Order;
use App\Repositories\Contracts\OrderRepositoryInterface;
use App\Repositories\Core\BaseEloquentRepository;

class EloquentOrderRepository extends BaseEloquentRepository implements OrderRepositoryInterface
{
    public function entity()
    {
        return Order::class;
    }

    public function search(array $data)
    {
        // TODO: Implement search() method.
    }
}
