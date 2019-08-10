<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Product extends Model
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

    /** 
     * Get current currecy 
     */
    public function currency()
    {
        return "N";
    }

    /**
     * Get discounted price
     */
    public function discountedPrice()
    {
        $discountedPrice = $this->price - (($this->discount / 100) * $this->price);
        return $discountedPrice;
    }

    /**
     * Get price with currency
     */
    public function getPriceWithCurrency()
    {
        $price = number_format($this->price, 2);
        return $price;
    }

    // Defining one to many relationship with Categories model.
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    // Defining one to many relationship with Sub Categories Model.
    public function subcategory()
    {
        return $this->belongsTo('App\SubCategory', 'sub_category_id');
    }

    // Defining amany to many relationship with sizes model.
    public function sizes()
    {
        return $this->belongsToMany('App\Size');
    }

    // Defining one to many relationship with images model.
    public function images()
    {
        return $this->hasMany('App\Image');
    }
}
