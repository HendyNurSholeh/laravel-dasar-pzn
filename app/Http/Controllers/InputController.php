<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InputController extends Controller
{
    public function hello(Request $request):string
    {
        $name = $request->input("name.first");
        return "Halo $name";
    }
}