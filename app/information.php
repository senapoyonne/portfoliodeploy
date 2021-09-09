<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class information extends Model
{
    //
    protected $dates = ['created_at', 'updated_at',];


    public static function showfourevent(){
        return information::orderBy('id', 'DESC')->take(4)->get();
    }
    
}
