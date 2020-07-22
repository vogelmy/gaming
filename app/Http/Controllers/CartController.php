<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;

class CartController extends Controller {

    public function placeOrder() {
        if (session('id')) {
            if (\Cart::count()) {
                Order::store();
                return redirect('shop')->with('status', 'Thank you for your order, your products are on their way.');
            }
            return redirect('cart');
        }
        session(['place-order-process' => true]);
        return redirect('login')->with('status', 'To complete your order you need to be logged in. Not registered yet?
                <a href="' . url('signup') . '">Click here</a>');
    }

    public function deleteCart() {
        \Cart::destroy();
        return redirect('shop')->with('status', 'The cart was deleted.');
    }

    public function deleteItem($rowId) {
        \Cart::remove($rowId);

        return redirect('cart')->with('status', 'The product was deleted from your cart.');
    }

    public function updateCart(Request $request) {
        \Cart::update($request->rowId, $request->quantity);
        $data = [
            'cart_count' => \Cart::count(),
            'cart_total' => \Cart::total(0),
            'product_total' => \Cart::get($request->rowId)->total(0),
        ];
        return json_encode($data);
    }

    public function displayCart() {
        \Cart::setGlobalTax(0);
        $data['items'] = \Cart::content();
        $data['total'] = \Cart::total();
        return view('cart.cart', $data);
    }

    public function addToCartByQty(Request $request) {
        Product::addToCart($request->id, (int) $request->quantity);
        return \Cart::count();
    }

    public function addToCart($id) {
        Product::addToCart($id);
        return \Cart::count();
    }

}
