<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';
    public function users()
    {
        return $this->hasOne('App\User');
    }
}
