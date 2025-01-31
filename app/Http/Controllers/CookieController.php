<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class CookieController extends Controller
{
    public function setCookie(Request $request):Response
    {
        $minutes = 1;
        return response("Hello World")->cookie("name", "Hendy", $minutes);
    }

    public function getCookie(Request $request):JsonResponse
    {
        return response()->json([
            "name" => $request->cookie("name")
        ]);
    }

    public function clearCookie(Request $request):Response
    {
        return response("Hello World")->withoutCookie("name");
    }
    
}