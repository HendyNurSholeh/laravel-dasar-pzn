<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InputController extends Controller
{
    public function hello(Request $request):string
    {
        if($request->method() == "POST"){
            $name = $request->input("name.first");
        } else {
            $name = $request->input("name");
        }
        return "Halo $name";
    }

    public function inputAllJson(Request $request):string
    {
        return json_encode($request->input());
    }

    public function inputArray(Request $request):string
    {
        return json_encode($request->input("products.*.name"));
    }

    public function inputQuery(Request $request):string
    {
        return json_encode($request->query());
    }
    
}