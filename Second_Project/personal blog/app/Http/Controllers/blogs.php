<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class blogs extends Controller
{
    public function fatch($id)
    {
        $article = DB::table("article")->where("article_id", $id)->first();
        $comment = DB::table("comments")->where("article_id", $id)->where("is_active", 1)->get();
        return View("posts", compact("article", "comment"));
    }
    public function edit($id)
    {
        $article = DB::table("article")->where("article_id", $id)->first();
        return View("update", compact("article"));
    }
    public function update()
    {
    }
        
    function RemoveBadWords($text){
        $text2 = explode(" " ,$text);
        $BadWords = ['teet', 'toot'];
        $rettext = [];
        foreach($text2 as $word){
        if(in_array("$word", $BadWords)){
            array_push($rettext,"***");
        }
        else{
            array_push($rettext,$word);
        }
        }
        return implode(" ",$rettext);
    }
    public function addcomment($id, Request $request)
    {
        DB::table('comments')->insert([
            "article_id" => $id,
            "comment_body" => $this->RemoveBadWords($request->message),
            "is_active" => 1,
            
        ]);

        $article = DB::table("article")->where("article_id", $id)->first();
        $comment = DB::table("comments")->where("article_id", $id)->where("is_active", 1)->get();
        return View("posts", compact("article", "comment"));
    }
}
