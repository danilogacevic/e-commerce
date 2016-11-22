<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id','is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function products(){

        return $this->hasMany('App\Product');
    }

    public function role(){

        return $this->belongsTo('App\Role');
    }

     public function getGravatarAttribute(){

        $hash = md5(strtolower(trim($this->attributes['email'])));

        return "http://gravatar.com/avatar/$hash" . "?d=mm";
    }
}
