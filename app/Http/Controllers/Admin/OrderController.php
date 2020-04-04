<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Contracts\OrderContract;

class OrderController extends BaseController
{
    protected $orderRepository;

    public function __construct(OrderContract $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function index()
    {
        $orders= $this->orderRepository->listOrders();

        $this->setPageTitle('Orders', 'List of  all Orders');

        return view('admin.orders.index', compact('orders'));
    }

    public function show($orderNumber)
    {
        $order = $this->orderRepository->findOrderByNumber($orderNumber);

        $this->setPageTitle('Order Details', $orderNumber);

        return view('admin.orders.show', compact('order'));
    }

    public function edit($orderNumber)
    {
        $order = $this->orderRepository->findOrderByNumber($orderNumber);

        $status= [
            'pending', 'processing', 'completed', 'decline'
        ];

        $this->setPageTitle('Update Order : ', $orderNumber);

        return view('admin.orders.edit', compact('order','status'));
    }

    public function update(Request $request)
    {
        $params = $request->except('_token');

        $order = $this->orderRepository->updateOrder($params);

        if(!$order){
            return $this->responseRedirectBack('Error occurred while updating Order', 'error', true, true);
        }

        return $this->responseRedirect('admin.orders.index', 'Order updated successfully' ,'success',false, false);
    }
}
