<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("type")->nullable();
            $table->string("link")->default("/system/default_spot_image.jpg");
            $table->string("about");
            $table->bigInteger('user_id')->default(0);#0: dont know user
            $table->bigInteger('blog_id')->default(0);#0: dont know blog
            $table->bigInteger('touris_spot_id')->default(0);#0: dont know where
            $table->bigInteger('like_count')->default(0);
            $table->bigInteger('dislike_count')->default(0);
            $table->integer('trusted')->default(0);#-1 cannot 0 normal 1 trusted
            $table->string("hashtag")->nullable();
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
        Schema::dropIfExists('images');
    }
}
