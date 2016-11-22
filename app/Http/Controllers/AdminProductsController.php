<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\ProductCreateRequest;

use App\Product;
use App\Photo;
use App\Category;

class AdminProductsController extends Controller
{
    //

    public function index(){

        $products = Product::all();
        
    	return view('admin.products.show',compact('products'));
        

      
         
    }

     public function create(){

        $categories = Category::pluck('cat_title','id')->all();
    
        return view('admin.products.create',compact('categories'));

        
     }

     public function store(ProductCreateRequest $request){

            $input =  $request->all();

            $user  = Auth::user();

            $user->products()->create($input);

            return view('admin.media.upload');
     }

        public function edit($id) {

        $product = Product::findOrFail($id);
        $categories = Category::pluck('cat_title','id')->all();

        return view('admin.products.edit',compact('product','categories'));

    }

    public function update(ProductCreateRequest $request, $id)
    {
        //
        $input = $request->all();
        Product::findOrFail($id)->update($input);
        return redirect('admin/products');
    }

    public function destroy($id){

        Product::findOrFail($id)->delete();

        return redirect()->back();
    }

    public function draft(){

        
    }
}
