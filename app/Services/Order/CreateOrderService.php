<?php


namespace App\Services\Order;

use App\Events\OrderCreatedEvent;
use App\Exceptions\NotDataProvided;
use App\Exceptions\NotOrderQuantityEnough;
use App\Exceptions\NotPriceProvided;
use App\Mail\CreateOrderMail;
use App\Repositories\Contracts\OrderProductsRepositoryInterface;
use App\Repositories\Contracts\OrderRepositoryInterface;

class CreateOrderService
{
    protected $ordersRepository;
    protected $orderProductsRepository;

    public function __construct(OrderRepositoryInterface $ordersRepository, OrderProductsRepositoryInterface $orderProductsRepository)
    {
        $this->ordersRepository = $ordersRepository;
        $this->orderProductsRepository = $orderProductsRepository;
    }

    public function run(array $data)
    {
        foreach ($data['products'] as $product) {
            if (isset($product) && is_array($product)) {
                if ($product['product'] == '') {
                    throw new NotDataProvided();
                }

                if ($product['qty'] < 1) {
                    throw new NotOrderQuantityEnough();
                }

                if ($product['price'] == 0) {
                    throw new NotPriceProvided();
                }
            } else {
                throw new NotDataProvided();
            }
        }

        $order = array(
            'customer_name' => $data['customer_name'],
            'created_at' => now(),
        );

        $customer_order = $this->ordersRepository->store($order);


        foreach ($data['products'] as $product) {
            $order_product = array(
              'order_id' => $customer_order->id,
              'product' => $product['product'],
              'price' => $product['price'],
              'qty' => $product['qty']
            );

            $this->orderProductsRepository->store($order_product);
        }

        $order_created = $this->ordersRepository->relationships('products')->findById($customer_order->id);

        event(new OrderCreatedEvent($order_created, $data['customer_name']));

        return $order_created;
    }
}
