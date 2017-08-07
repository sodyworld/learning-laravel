<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Facebook extends Controller
{
    public function  __invoke(){
        return view('facebook.index');
    }
}
