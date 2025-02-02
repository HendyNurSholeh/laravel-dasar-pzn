<?php

use App\Http\Controllers\CookieController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\ResponseController;
use Illuminate\Support\Facades\Route;

//add middleware group
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
Route::post('input/type', [InputController::class, 'inputType']);
Route::post('input/filter-only', [InputController::class, 'inputFilterOnly']);
Route::post('input/filter-except', [InputController::class, 'inputFilterExcept']);
Route::post('input/merge', [InputController::class, 'inputMerge']);
Route::post('input/merge-if-missing', [InputController::class, 'inputMergeIfMissing']);
Route::post('file/upload', [FileController::class, 'upload']);
//grouop
Route::prefix('response')->group(function () {
    Route::post('/response', [ResponseController::class, 'response']);
    Route::post('/response-with-header', [ResponseController::class, 'responseWithHeader']);
    Route::get('/response-with-view', [ResponseController::class, 'responseWithView']);
    Route::get('/response-with-json', [ResponseController::class, 'responseWithJson']);
    Route::get('/response-with-file', [ResponseController::class, 'responseWithFile']);
    Route::get('/response-with-download', [ResponseController::class, 'responseWithDownload']);
});

Route::post('cookie/set', [CookieController::class, 'setCookie']);
Route::get('cookie/get', [CookieController::class, 'getCookie']);
Route::post('cookie/clear', [CookieController::class, 'clearCookie']);
Route::get('redirect/redirect-to', [RedirectController::class, 'redirectTo']);
Route::get('redirect/redirect-from', [RedirectController::class, 'redirectFrom']);
Route::get('redirect/hello/{name}', [RedirectController::class, 'redirectHello'])->name('redirect.hello');
Route::get('redirect/route', [RedirectController::class, 'redirectRoute']);
Route::get('redirect/action', [RedirectController::class, 'redirectAction']);
Route::get('redirect/away', [RedirectController::class, 'redirectAway']);
// add middleware


Route::middleware('contoh:123456,401')->group(function () {
    Route::get('middleware', function () {
        return "OK";
    });
    Route::get('middleware-parameter', function () {
        return "OK";
    });
});

// without middleware csrftoken
Route::get('middleware-csrf', function () {
    return "OK";
})->withoutMiddleware('csrf');