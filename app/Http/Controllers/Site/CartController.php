<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    protected $cart;
    public function getCart()
    {
        $cart = Cart::getContent();
        return view('site.pages.cart', compact('cart'));
    }

    public function removeItem($id)
    {
        Cart::remove($id);

        if (Cart::isEmpty()) {
            return redirect('/');
        }
        return redirect()->back()->with('message', 'Item removed from cart successfully.');
    }

    public function clearCart()
    {
        Cart::clear();

        return redirect('/');
    }

    public function UpdateCart(Request $request)
    {
        $this->cart = Cart::update($request->id,array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->qty
            )
        ));

        //dd(Cart::getContent());
        return redirect()->back()->with('message','Updated ');
    }
}
