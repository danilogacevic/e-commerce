<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewProductsController extends Controller
{
    //

    public function index(){

    	return view('admin.view_products');
    }
}
