<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use App\Category;

class SubCategory extends Model
{
    use SoftDeletes;
    // protected $table = 'subcategories';

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

    // Get category id.
    static function getCategoryId($slug)
    {
        $category_id = Category::where('slug', '=', $slug)->first()->id;
        return $category_id;
    }

    // Defining one to many relationship with Category model.
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    // Defining one to many relationship with Product model.
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
