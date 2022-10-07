<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('comments', function (Blueprint $table){
            $table->id('comment_id');
            $table->unsignedBigInteger('article_id');
            $table->foreign('article_id')->references('article_id')->on('article');
            $table->string("comment_body",2000);
            $table->string("comment_img",2000);
            $table->boolean("is_active");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
