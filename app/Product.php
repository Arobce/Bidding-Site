<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //

    protected $fillable = ['name', 'image_url', 'description','category','initial_price','final_price'];


    public function user(){
        return $this->belongsTo('App\User');
    }
}
