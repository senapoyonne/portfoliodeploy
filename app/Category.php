<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public static function showcategories(){
        return Category::orderBy('name', 'DESC')->get();
    }
    //
    //
}
