<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;

class testController extends Controller
{
    
    public function test()
    {
        return view('test.test');
    }
}
