<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderFormRequest;
use App\Repositories\Contracts\OrderRepositoryInterface;
use App\Services\Order\CreateOrderService;
use App\Services\Order\FindServicesByDate;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    protected $createOrderService;
    protected $findServicesByDate;
    protected $ordersRepository;

    public function __construct(CreateOrderService $createOrderService, FindServicesByDate $findServicesByDate, OrderRepositoryInterface $ordersRepository)
    {
        $this->createOrderService = $createOrderService;
        $this->findServicesByDate = $findServicesByDate;
        $this->ordersRepository = $ordersRepository;
    }

    public function index(Request $request)
    {
        $orders = $this->findServicesByDate->run($request->all());

        return response()->json($orders);
    }

    public function store(StoreOrderFormRequest $request)
    {
        $order = $this->createOrderService->run($request->all());

        return response()->json($order);
    }

    public function show($id)
    {
        // Quando não há regra de negócio, o controller pode chamar diretamente o repository.
        $order = $this->ordersRepository->relationships('products')->findById($id);

        return response()->json($order);
    }
}
