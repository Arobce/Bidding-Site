<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    const CREATED_AT = 'added_time';
    const UPDATED_AT = 'last_updated';

    public function user(){
        return $this->belongsTo('App\User');
    }
}
