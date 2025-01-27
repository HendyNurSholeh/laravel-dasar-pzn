<?php

use App\Http\Controllers\HelloController;
use App\Http\Controllers\InputController;
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
Route::get("/categories/{id}", function ($id) {
    return "Category id: {$id}";
})->where("id", "[0-9]+")->name("categories.detail");
Route::get("/categories/{name?}", function ($name = "kosong") {
    return "Category name: {$name}";
});

Route::get('/confilict/hendy', function ($name) {
    return "confilict hendy nur sholeh";
});
Route::get('/confilict/{name}', function ($name) {
    return "confilict {$name}";
});

Route::get('products/{id}', function ($id) {
    $link = route('categories.detail', ['id' => $id]);
    return "<a href='{$link}'>Category link: {$link}</a>";
})->name('products');

Route::get('products-redirect/{id}', function ($id) {
    return redirect()->route('categories.detail', ['id' => $id]);
})->name('products.redirect');

Route::get('hello/request', [HelloController::class, 'testRequest']);
Route::get('hello/{name}', [HelloController::class, 'hello', 'name' => 'Hendy']);
Route::get('input/hello', [InputController::class, 'hello']);
Route::post('input/hello', [InputController::class, 'hello']);
Route::post('input/all', [InputController::class, 'inputAllJson']);
Route::get('input/all', [InputController::class, 'inputAllJson']);
Route::post('input/array', [InputController::class, 'inputArray']);
Route::get('input/query', [InputController::class, 'inputQuery']);
Route::post('input/query', [InputController::class, 'inputQuery']);