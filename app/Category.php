<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

     /**
     *  Generate Unique Slug for project
     * 
     * @return slug
     */
    public function slug()
    {
        $slug = Str::slug($this->name, '-');
        return $slug;
    }

    public function subcategories()
    {
        return $this->hasMany('App\SubCategory');
    }

    // Defining one to many relationship with Product model.
    public function products()
    {
        return $this->hasMany('App\Product');
    }

}
