<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Post extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    /**
     *  Generate Unique Slug for product.
     * 
     * @return slug
     */
    public function slug()
    {
        $slug = Str::slug($this->name, '-');
        return $slug;
    }

    /**
     *  Generate random string for product SKU.
     * 
     * @return sku
     */
    public function sku()
    {
        $sku = Str::random(15);
        $sku = 'M' . strtoupper($sku) . 'MSPS';
        return $sku;
    }

    public function getTimeAgo($carbonObject) {
        // return str_ireplace(
        //     [' seconds', ' second', ' minutes', ' minute', ' hours', ' hour', ' days', ' day', ' weeks', ' week'], 
        //     ['s', 's', 'm', 'm', 'h', 'h', 'd', 'd', 'w', 'w'], 
        //     $carbonObject->diffForHumans()
        // );
        return $carbonObject->diffForHumans();
    }

    // Defining one to many relationship with images model.
    public function images()
    {
        return $this->hasMany('App\Image', 'related_id')->whererelated_to('posts');
    }
}
