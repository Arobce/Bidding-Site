<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    //
    const CREATED_AT = 'bid_time';
    const UPDATED_AT = 'last_update';

    
    //Relationships
    public function users(){
        return $this->belongsTo('App\User');

    }

    public function products(){
        return $this->belongsTo('App\Product');
    }
}
