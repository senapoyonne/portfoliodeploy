<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Builder extends Model
{
    public static function showbuilders(){
        return Builder::orderBy('name', 'DESC')->get();
    }
    //
}
