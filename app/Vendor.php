<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    public function admin(){
        return $this->belongsTo('App\Admin','vendor_owner');
    }
}
