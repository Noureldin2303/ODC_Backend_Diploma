<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class admin extends Controller
{
    
    # addNewArticle - DeleteArticle - HideComment - login
    function Login()
    {
        return view("login");
    }

    public function postlogin(Request $request)
    {
        
        $data = [
            "email"=>$request->email,
            "password"=>$request->password
        ];

        if(Auth::attempt($data)){
            return redirect("/");
        }
        return redirect("login");
    }

    public function logout(){
        Auth::logout();
        return redirect("login");
    }

    public function addNewArticle(Request $request)
    {
        $ss = "blog-".rand(1,10).".png";
        DB::table("article")->insert([
            "article_body" => $request->article_body,
            "title" => $request->title,
            "category_id"=>1,
            "is_active" => 1,
            "img"=>"$ss",
        ]);
        
        return redirect("/");
    }


    public function UpdateArticle($id,Request $request)
    {
        DB::table("article")->where('article_id', $id)->update([
            "article_body" => $request->article_body,
            "title" => $request->title
        ]);
        return redirect("/");
    }
    public function DeleteArticle($id,Request $request)
    {
        DB::table("comments")->where('article_id', $request->id)->delete();
        DB::table("article")->where('article_id', $id)->delete();
        return redirect("/");
    }
    public function DeleteComment(Request $request)
    {
        DB::table("comments")->where('comment_id', $request->id)->delete();
        return redirect("/");
    }
    public function hidearticle(Request $request)
    {
        DB::table("article")->where('article_id', $request->id)->update([
            "is_active" => 0
        ]);
        return redirect("/");
    }
    public function HideComment(Request $request)
    {
        DB::table("comments")->where('comment_id', $request->id)->update([
            "isactive" => 0
        ]);
        return redirect("/");
    }
}
