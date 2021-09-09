<?php

namespace App\Http\Controllers;

use App\information;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function index($param){

        $event = information::find($param);
        return view('info',compact('event'));
    }
    //
}
