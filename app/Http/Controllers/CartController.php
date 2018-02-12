<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;

use App\Product;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        //

        $total         = 0;
        $item_quantity = 0;
        $item_name     = 1;
        $item_number   = 1;
        $amount        = 1;
        $quantity      = 1;


        $proizvodi = Session::get('products')['id'];

        $products = Product::findMany($proizvodi);

        return view('checkout',compact('products','item_quantity','item_name','item_number','amount','quantity','total'));

        // Session::flush();
        // Cache::flush();

    }

    public function addProduct($id){



                        if(Session::get('products')['id']){

                        $product_niz = Session::get('products')['id'];

                                    foreach ($product_niz as $item) {
                                        
                                        $item != $id ? $a=false : $a=true;

                                            if($a) goto end;

                                        }

                                        if(!$a) {Session::push('products.id', $id);goto end;}

                        } else {

                         Session::push('products.id', $id);


                        }



                end:

                if(Session::has('product_'.$id)){

                    $amount = 1;

                    Cache::increment('amount'.$id,$amount);

                    Session::set('product_'.$id,Cache::get('amount'.$id));

                    return redirect('/products/');

                    
                } else {

                    Cache::put('amount'.$id,1,10);

                    Session::set('product_'.$id,Cache::get('amount'.$id));

                    return redirect('/products/');
                }

          
   }

   public function decreaseQuantity($id){

    if(session('product_'.$id)>1){

        $amount = 1;

        session(['product_'.$id => Cache::decrement('amount'.$id,$amount)]);

        return redirect('/products');

    } else {

        session()->forget('product_'.$id);

        return redirect('/products');
    }


   }

    public function increaseQuantity($id){

       $product = Product::findOrFail($id);

                if(session('product_'.$id) < $product->product_quantity){

                    $amount = 1;

                    session(['product_'.$id => Cache::increment('amount'.$id,$amount)]);

                    return redirect('/products');

                    

                } else {

                    session()->flash('message','We have only '. $product->product_quantity . 'left');

                    return redirect('/products');
                }


   }


   public function removeProduct($id){

    session()->forget('product_'.$id);

    return redirect('/products');
   }
}
