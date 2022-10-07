<?php

use App\Http\Controllers\admin;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\blogs;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    $blogs = new blogs;   
    $articles= DB::table("article")->join("category","article.category_id","=","category.category_id")->where('article.is_active',1)->get();
    return view('index', compact("articles"));
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/logout', function () {
    Auth::logout();
    return redirect("login");
});
Route::get('Blog/Create', function () {
    return view('create');
});
// Route::get('/',function (){
//     Storage::disk('samir')->put('','');
//     return "tmam";
// })
// ;
Route::get('show',[UploadController::class,'show']);
// Route::get('Blog/Create', [admin::class, "create"]);

Route::post('/postlogin', [admin::class, "postlogin"]);
Route::get("/post/{id}", [blogs::class, "fatch"]);
Route::get("/edit/{id}", [blogs::class, "edit"]);
Route::post("blog/add", [admin::class, "addNewArticle"]);
Route::post("comment/add/{id}", [blogs::class, "addcomment"]);
Route::get("post/delete/{id}", [admin::class, "DeleteArticle"]);
Route::get("post/hide/{id}", [admin::class, "hidearticle"]);
Route::post("blog/update/{id}", [admin::class, "UpdateArticle"]);



