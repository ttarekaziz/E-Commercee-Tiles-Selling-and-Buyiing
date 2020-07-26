<?php

namespace App\Http\Controllers;

use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;

class CartController extends Controller
{
    public function cart()
    {

        $userId = auth()->user()->id;

        $items = \Cart::session($userId)->getContent();
        $subTotal = \Cart::session($userId)->getTotal();
        $Total = \Cart::session($userId)->getSubTotal();
        return view('frontend.cart', compact(['items', 'subTotal', 'Total']));
    }

    public function addcart($pid)
    {

        $product = Product::findorfail($pid);
        $userid = auth()->user()->id;

        \Cart::session($userid)->add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'associatedModel' => $product
        ));

        return redirect()->back();
    }

    public function buyNow($pid)
    {
        $product = Product::findorfail($pid);
        $userid = auth()->user()->id;
        \Cart::session($userid)->add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'associatedModel' => $product
        ));

        return redirect(route('cart'));
    }


    public function updateCart(Request $request)
    {
        $quantities = $request->quantity;
        $items = $request->id;
        $userid = auth()->user()->id;
        for ($i=0 ; $i< count($quantities); $i++) {

            \Cart::session($userid)->update($items[$i], array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $quantities[$i]
                ),
            ));
        }

        return redirect()->back();
    }


    public function cartRemove($pid)
    {
        $userid = auth()->user()->id;
        \Cart::session($userid)->remove($pid);

        return redirect()->back();
    }


}
