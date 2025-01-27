<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Service\HelloService;
use Illuminate\Http\Request;

class HelloController extends Controller
{
    private HelloService $service;
    public function __construct(HelloService $service)
    {
        $this->service = $service;
    }
    
    public function hello(Request $request, $name):string
    {
        return $this->service->hello($name);
    }

    public function testRequest(Request $request):string
    {
        return  $request->path() .PHP_EOL.
        $request->url() .PHP_EOL.
        $request->fullUrl() .PHP_EOL.
        $request->method() .PHP_EOL.
        $request->header("Accept");
    }
}