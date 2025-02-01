<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RedirectController extends Controller
{
    public function redirectTo():string{
        return "Redirect To";
    }

    public function redirectFrom():RedirectResponse{
        return redirect()->to("redirect/redirect-to");
    }

    public function redirectRoute():RedirectResponse{
        return redirect()->route("redirect.hello", ['name' => 'Hendy']);
    }

    public function redirectAction():RedirectResponse{
        return redirect()->action([HelloController::class, 'hello'], ['name' => 'Hendy']);
    }

    public function test(){
        return "test";
    }

    public function redirectHello(string $name):string{
        return "Hello $name";
    }

    public function redirectAway():RedirectResponse{
        return redirect()->away('https://www.google.com');
    }

    
}