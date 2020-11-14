<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderFormRequest;
use App\Repositories\Contracts\OrderRepositoryInterface;
use App\Services\Order\CreateOrderService;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    protected $createOrderService;
    protected $ordersRepository;

    public function __construct(CreateOrderService $createOrderService, OrderRepositoryInterface $ordersRepository)
    {
        $this->createOrderService = $createOrderService;
        $this->ordersRepository = $ordersRepository;
    }

    public function index()
    {
        // Quando não há regra de negócio, o controller pode chamar diretamente o repository.
        $orders = $this->ordersRepository->relationships('products')->all();

        return response()->json($orders);
    }

    public function store(StoreOrderFormRequest $request)
    {
        $order = $this->createOrderService->run($request->all());

        return response()->json($order);
    }

    public function show($id)
    {
        //
    }
}
