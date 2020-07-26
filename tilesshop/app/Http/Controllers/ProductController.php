<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;

class ProductController extends Controller
{
     public function list()
    {
        $all_products=Product::with('category')->get();
        return view('admin.products.productlist',compact('all_products'));
    }

    public function createForm()
    {
        $categories=Category::all();

       return view('admin.products.productcreate',compact('categories'));
    }


    public function create(Request $request)
    {

        $request->validate([
            'product_name' => 'required',
            'length' => 'required',
            'width' => 'required',
            'product_price' => 'required|integer',
            'product_category' => 'required|integer',

        ]);


        $file_name = '';
        if ($request->hasFile('product_image')) {
            $product = $request->file('product_image');
            if ($product->isValid()) {
                //generate file name
                $file_name = date('Ymdhms').'.'.$product->getClientOriginalName();
                //store into directory
                $product->storeAs('product', $file_name);
            }
        }


    Product::create([
        'category_id'=>$request->product_category,
        'name'=>$request->product_name,
        'price'=>$request->product_price,
        'length'=>$request->length,
        'width'=>$request->width,
        'description'=>$request->product_description,
        'product_image'=>$file_name
    ]);
    return redirect()->back()->with('message','Product Created Successfully.');

    }


    public function shopproduct()
    {
        $all_products = Product::with('category')
            ->paginate(6);
        return view('frontend.shop', compact('all_products'));
    }


    public function signleProduct($id)
    {
        $product = Product::with('category')->find($id);
        return view('frontend.singleproduct', compact('product'));
    }


/*modify/update/edit*/
 public function edit($id)
    {

        $categories=Category::all();
        $products=Product::find($id);

        return view('admin.products.productedit', compact('products','categories'));

    }



    public function update(Request $request,$id)
    {
        if ($request->hasFile('product_image')) {
            $product = $request->file('product_image');
            if ($product->isValid()) {
                //generate file name
                $file_name = date('Ymdhms').'.'.$product->getClientOriginalName();
                //store into directory
                $product->storeAs('product', $file_name);
            }
            Product::find($id)->update([
                'category_id'=>$request->product_category,
                'name'=>$request->product_name,
                'price'=>$request->product_price,

                'description'=>$request->description,
                'product_image'=>$file_name,
                /*'updated_by'=>auth()->user()->id*/
            ]);
        }else
        {
            Product::find($id)->update([
                'category_id'=>$request->product_category,
                'name'=>$request->product_name,
                'price'=>$request->product_price,

                'description'=>$request->product_description,
               /* 'updated_by'=>auth()->user()->id*/
            ]);
        }



        return redirect('/productlist')->with('message', 'Data is Update');
    }







    public function delete($id)
    {
        $products=Product::find($id);
        $products->delete();
        return redirect('/productlist')->with('message', 'Data is delete Successfully');
    }




    




}
