<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    const CREATED_AT = 'transaction_time';

    //Relationships
    public function users(){
        return $this->belongsTo('App\User');

    }

    public function products(){
        return $this->belongsTo('App\Product');
    }

}
