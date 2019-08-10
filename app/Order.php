<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Order extends Model
{
    use SoftDeletes;
    // protected $table = 'subcategories';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    // Defining one to many relationship with User model.
    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }
    // Defining one to many relationship with User model.
    public function customer()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function address(){
        return $this->belongsTo('App\Address', 'user_id', 'user_id');
    }
    public function vendoor(){
        return $this->belongsTo('App\Vendor', 'shop_id', 'vendor_owner');
    }
    public function admin(){
        return $this->belongsTo('App\Admin', 'shop_id');
    }
    // Returns random numbers
    private function rand_num($length) {
        $str = "";
        $chars = "0123456789";
        $size = strlen($chars);
        for($i = 0; $i < $length; $i++) {
            $str .= $chars[rand(0, $size - 1)];
        }
        return $str;
    }

     /**
     *  Generate random string for order ID.
     * 
     * @return sku
     */
    public function getOrderId()
    {
        $order_id = "SM-95" . $this->rand_num(5);
        return $order_id;
    }

    // Format Date.
    public function date()
    {
        $date = date('F d, Y', strtotime($this->created_at));
        return $date;
    }
}
