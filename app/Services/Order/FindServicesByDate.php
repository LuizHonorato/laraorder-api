<?php


namespace App\Services\Order;


use App\Repositories\Contracts\OrderRepositoryInterface;

class FindServicesByDate
{
    protected $ordersRepository;

    public function __construct(OrderRepositoryInterface $ordersRepository)
    {
        $this->ordersRepository = $ordersRepository;
    }

    public function run(array $data)
    {
        if (isset($data['to']) && isset($data['from'])) {
            return $this->ordersRepository->relationships('products')->findWhereBetween('created_at', $data['to'], $data['from']);
        } else {
            return $this->ordersRepository->relationships('products')->all();
        }
    }
}
