<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Contracts\OrderContract;
use App\Services\PayPalService;

class CheckoutController extends Controller
{
    protected $paypal;
    protected $orderRepository;

    public function __construct(OrderContract $orderRepository, PayPalService $paypal)
    {
        $this->payPal = $paypal;
        $this->orderRepository = $orderRepository;
    }

    public function getCheckout()
    {
        $shipping = Cart::getSubTotal() < config('settings.shipping_min') ? config('settings.shipping') : 0;

        

        return view('site.pages.checkout');
    }

    public function placeOrder(Request $request)
    {
        $order = $this->orderRepository->storeOrderDetails($request->all());

        if ($order) {
            //$this->payPal->proccessPayment($order);
            Cart::clear();
            return redirect()->route('home');
        }
    
        return redirect()->back()->with('message','Order not placed');
    }

    public function complete(Request $request)
    {
        $paymentId = $request->input('paymentId');
        $payerId   = $request->input('PayerID');

        $status    = $this->paypal->completePayment($paymentId,$payerId);

        $order     = Order::where('order_number', $status['invoiceId'])->first();
        $order->status = 'processing';
        $order->payment_status = 1;
        $order->payment_method = 'PayPal -'.$status['salesId'];
        $order->save();

        Cart::clear();
        return view('site.pages.success', compact('order'));
    }
}
