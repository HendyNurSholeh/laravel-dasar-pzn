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
    
    public function hello($name):string
    {
        return $this->service->hello($name);
    }
}