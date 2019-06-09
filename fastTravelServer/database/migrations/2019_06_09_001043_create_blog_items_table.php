<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text("title")->nullable();
            $table->text("body")->nullable();
            $table->bigInteger("user_id");
            $table->bigInteger("spot_id")->default(0);
            $table->bigInteger("blog_id");
            $table->bigInteger('like_count')->default(0);
            $table->bigInteger('dislike_count')->default(0);
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
        Schema::dropIfExists('blog_items');
    }
}
