<?php

namespace App\Http\Controllers;

use App\Models\Order;

use App\Models\Product;

use  App\Models\OrderItem;

use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{

    public function mycompleteorder()
    {
        $user = Auth::user()->id;
        $orders = Order::where('user_id', $user)->where('status','completed')->get();
        return view('frontend.mycompleteorders', compact(['orders']));
    }


    public function mypendingorder()
    {
        $user = Auth::user()->id;
        $orders = Order::where('user_id', $user)->where('status','pending')->get();
        return view('frontend.mypendingorders', compact(['orders']));
    }


    public function cancelorder($id)
    {
        $orders=Order::find($id);

        return view('frontend.cancelorder', compact('orders'));
        
    }


    public function confirmcancelorder(Request $request, $id)
    {




      
       $orders=Order::findOrFail($id);
        $orders->status="cancel";
        
        $orders->save();
     

 $all_orders=Order::where('status','pending')->paginate(100);
        return view('frontend.mypendingorders',compact('all_orders'));
    }




    public function placeOrder(Request $request)
    {
        $userId = auth()->user()->id;
        $order = Order::create([
            'order_number'      =>  'ORD-'.strtoupper(uniqid()),
            'user_id'           => auth()->user()->id,
            'status'            =>  'pending',
            'grand_total'       =>  \Cart::session($userId)->getSubTotal(),
            'item_count'        =>  \Cart::session($userId)->getTotalQuantity(),
            'payment_status'    =>  0,
            'payment_method'    =>  null,
            'first_name'        =>  $request->first_name,
            'last_name'         =>  $request->last_name,
            'address'           =>  $request->address,
            'city'              =>  $request->city,
            'country'           =>  $request->country,
            'post_code'         =>  $request->post_code,
        ]);


        //item1 p  10;
        
        //3


        if ($order) {

            $items = \Cart::session($userId)->getContent();

            foreach ($items as $item)
            {
                // A better way will be to bring the product id with the cart items
                // you can explore the package documentation to send product id with the cart
                $product = Product::where('name', $item->name)->first();

                $orderItem = new OrderItem([
                    'product_id'    =>  $product->id,
                    'quantity'      =>  $item->quantity,
                    'price'         =>  $item->getPriceSum()
                ]);

                $order->items()->save($orderItem);
            }
           }

        \Cart::clear();
        \Cart::session($userId)->clear();

        return redirect()->route('homeroute');
    }




    public function showOrder($id)
    {
        $order= Order::where('id', $id)->with('items.product')->first();
        return view('admin.Products.orderItems', compact(['order']));
    }


    public function removeOrder($id)
    {
        $order= Order::findorfail($id);
        $order->delete();
        return redirect()->route('admin.orders');
    }


    public function pendingorderlist()
    {
        $all_orders=Order::where('status','pending')->paginate(10);
        return view('admin.order.pendingorderlist',compact('all_orders'));
    }

    public function completeorderlist()
    {
        $all_orders=Order::where('status','completed')->paginate(10);
        return view('admin.order.completeorderlist',compact('all_orders'));
    }

     public function cancelorderlist()
    {
        $all_orders=Order::where('status','cancel')->paginate(10);
        return view('admin.order.cancelorderlist',compact('all_orders'));
    }





    public function orderaccept($id)
    {
        $orders=Order::find($id);

        return view('admin.order.confirmorder', compact('orders'));
        
    }




    public function confirmorder(Request $request, $id)
    {




      
       $orders=Order::findOrFail($id);
        $orders->status="completed";
        
        $orders->save();
     

 $all_orders=Order::where('status','pending')->paginate(100);
        return view('admin.order.pendingorderlist',compact('all_orders'));
    }
}
