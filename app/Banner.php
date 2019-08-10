<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    /**
     * Definigng one-to-many relationship with Project modell
     */
    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    /**
     * Function to get image source
     */
    public function getImageSource()
    {
        if ($this->src == '') {
            $path = "http://www.aquagemdental.com/wp-content/uploads/2016/10/orionthemes-placeholder-image.png";
        } else {
            $path = asset('images/_uploads/banner_images/' . $this->src);
        }
        return $path;
    }

    /**
     *  Define image storage location
     *  @param filename
     */
    public function storageLocation($filename)
    {
        $location = public_path('images/_uploads/banner_images/' . $filename);
        return $location;
    }
}
