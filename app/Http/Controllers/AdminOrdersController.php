<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;

class AdminOrdersController extends Controller
{
    //

    public function index(){

    	$orders = Order::all();
    	return view('admin.orders.index',compact('orders'));

    }

     public function destroy($id){

    	Order::findOrFail($id)->delete();
    	return redirect()->back();

    }
}
