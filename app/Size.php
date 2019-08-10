<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    // Defining many to many relationship with Product model.
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
