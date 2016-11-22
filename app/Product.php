<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //

    protected $fillable = [

    'user_id',
    'product_title',
    'category_id',
    'is_active',
    'product_price',
    'product_quantity',
    'product_description',
    'short_description'

                    ];

    public function category(){

        return $this->belongsTo('App\Category');
    }

    public function photos(){

    	return $this->hasMany('App\Photo');
    }
}
