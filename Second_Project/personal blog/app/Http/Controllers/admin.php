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
        $req = $request->only("email", "password");
        $r = DB::table('users')->where("email", "=", $req['email'])->where("password", "=", $req["password"])->get();
        if (count($r)) {
            setcookie('admin', true, time() + 60 * 60 * 60, '/');
            return redirect('/');
        } else {
            return redirect("login");
        }
    }

    public function addNewArticle(Request $request)
    {
        $ss = "blog-".rand(1,10).".png";
        DB::table("article")->insert([
            "article_body" => $request->article_body,
            "title" => $request->title,
            "category_id"=>1,
            "is_active" => 1,
            "time"=>now(),
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
    public function DeleteArticle($id)
    {
        DB::table("article")->where('article_id', $id)->delete();
        return redirect("/");
    }
    public function DeleteComment(Request $request)
    {
        DB::table("comment")->where('id', $request->id)->delete();
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
        DB::table("comments")->where('id', $request->id)->update([
            "isactive" => 0
        ]);
        return redirect("/");
    }
}
