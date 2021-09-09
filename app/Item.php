<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    protected $primaryKey = 'product_id';


    public static function showitems(){
        return Item::orderBy('product_id', 'DESC')->take(6)->get();
    }
    //
}
