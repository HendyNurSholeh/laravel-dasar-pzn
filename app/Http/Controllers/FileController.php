<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function upload(Request $request): string
    {
        $file = $request->file('file');
        $path = $file->storePubliclyAs('files', $file->getClientOriginalName(), 'public');
        return $path;
    }

    public function download(Request $request): string
    {
        return response()->download(storage_path('app/' . $request->file));
    }
}