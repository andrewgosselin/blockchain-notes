<?php

use Illuminate\Support\Facades\Route;
use App\Models\File;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     $name = "test";
//     $type = "txt";
//     $content = "this is a winner!";
//     $model = new \App\Models\File();
//     $model->user_id = 1;
//     $model->name = $name;
//     $model->type = $type;
//     $model->upload($content, true);

//     File::first()->revise("heres an update 2");

//     dd(File::first()->content);
// });

Route::redirect("/", "/create");

Route::get('/{page?}', function ($page = null) {
    if(!view()->exists('pages.' . str_replace("/", ".", $page))) {
        abort(404);
    }
    return view('index')
        ->with("page", $page);
});

Route::get('/pages/{page?}', function ($page) {
    $view = 'pages.' . str_replace("/", ".", $page);
    if(!view()->exists($view)) {
        abort(404);
    }
    return view($view);
})->where('page', '(.*)');

Route::post("/notes", "App\Http\Controllers\FileController@store")->name("notes.store");
Route::get("/notes/public", "App\Http\Controllers\FileController@public")->name("notes.public");
Route::get("/notes/{parent_id}", "App\Http\Controllers\FileController@show")->name("notes.show");
Route::get("/notes/{parent_id}/raw", "App\Http\Controllers\FileController@show_raw")->name("notes.show_raw");

