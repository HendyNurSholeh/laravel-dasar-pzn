<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function createSession(Request $request): string
    {
        $request->session()->put('name', 'Hendy');
        return 'Session created';
    }

    public function getSession(Request $request): string
    {
        return $request->session()->get('name', 'guest');
    }
    
}