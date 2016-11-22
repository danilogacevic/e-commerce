<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //

    protected $uploads = '/images/';

    protected $fillable = [

    'name',
    'product_id'

    ];

    // public function products(){

    // 	return $this->hasMany('App\Product');
    // }

    public function getNameAttribute($name){

    	return $this->uploads . $name;
    }
}
