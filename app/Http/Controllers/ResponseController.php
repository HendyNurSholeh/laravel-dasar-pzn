<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ResponseController extends Controller
{
    public function response(): Response
    {
        return response("Hello World", 200);
    }

    public function responseWithHeader():Response
    {
        $body = [
            "name" => "Hendy",
            "email" => "hendy@gmail.com",
        ];
        return response(json_encode($body), status: 200)
            ->header("Content-Type", "application/json");
    }

    public function responseWithView(): Response
    {
        return response()->view("hello", ["name" => "Hendy"]);
    }

    public function responseWithJson():JsonResponse
    {
        return response()->json(["name" => "Hendy"]);
    }
    
}