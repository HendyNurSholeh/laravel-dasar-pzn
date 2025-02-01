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
}