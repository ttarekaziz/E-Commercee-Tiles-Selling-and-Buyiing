<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;


use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home(){

    	return view('admin.home');
    }



    
    
}
