<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::redirect('/sholeh', '/hendy');
Route::get('/hendy', function () {
    return "hendy nur sholeh";
});
Route::fallback(function () {
    return "Maaf, halaman tidak ditemukan";
});
// Route::get("hello", function(){
//    return view("hello", ["name" => "Hendy"]);
// });
Route::view("hello", "hello", ["name" => "Hendy"]);
Route::view("hello-word", "hello.word", ["name" => "Hendy"]);
Route::get("products/{id}", function($productId){
    return "Product id: {$productId}";
});
Route::get("products/{id}/items/{item}", function($productId, $item){
    return "Product id: {$productId} and item: {$item}";
});
