<?php

namespace App\Http\Controllers;
use App\Product;
use App\Customer;
use Illuminate\Http\Request;

class UserController extends Controller {

    public function _construst() {
        
    }

    public function dashboard() {


        $customers = Customer::orderby('id', 'asc')->get();
        $products = Product::orderby('id','asc')->get();

        return view('admin.dashboard', compact('customers','products'));
    }

    
    
}
