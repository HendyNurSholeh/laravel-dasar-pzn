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

    public function inputType(Request $request):string
    {
        return json_encode([
            "name" => $request->input("name"),
            "age" => $request->integer("age"),
            "is_active" => $request->boolean("is_active"),
            "price" => $request->float("price"),
            "married" => $request->date("married", "Y-m-d")->format("d-m-Y"),
        ]);
    }
    
    public function inputFilterOnly(Request $request):string
    {
        return json_encode($request->only(["name", "age"]));
    }

    public function inputFilterExcept(Request $request):string
    {
        return json_encode($request->except(["name", "age"]));
    }
    
}