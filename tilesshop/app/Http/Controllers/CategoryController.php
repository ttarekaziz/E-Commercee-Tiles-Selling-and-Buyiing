<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category()
    {

    $all_data=Category::paginate(5);
    $title='Category List show';

        return view('admin.category.categorylist',compact('all_data','title'));
    }



    public function create(Request $request)
    {


        Category::create([
//            'column name'=>'input / value'
            'name'=>$request->category_name
        ]);
    return redirect()->back();
    }



    public function edit($id)
    {
        $categories=Category::find($id);

        return view('admin.category.categoryedit', compact('categories'));
        
    }


    public function update(Request $request, $id)
    {
$request->validate([
'name'=>'required',



        ]);
        $categories=Category::findOrFail($id);
        $categories->name=$request->get('name');
        
        $categories->save();
        return redirect('/categorylist')->with('success', 'Data is Update');
    }



     public function delete($id)
    {
        $categories=Category::find($id);
        $categories->delete();
        return redirect('/categorylist')->with('success', 'Data is delete Successfully');
    }

}
