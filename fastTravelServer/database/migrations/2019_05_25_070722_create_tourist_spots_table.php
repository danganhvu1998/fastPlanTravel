<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTouristSpotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tourist_spots', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("name");
            $table->string("type")->nullable(); #exproration, adventure, getaway
            $table->integer("popularness")->default(0);
            $table->string("hashtag")->nullable();
            $table->integer("level")->default(0);#big_area -> country -> area -> province -> spot(main) -> inside_a_spot
            $table->integer("typical_spending_dollar")->default(0);#exclude ticket price
            $table->double("latitude")->default(0.0);
            $table->double("longitude")->default(0.0);
            $table->double("rate")->default(0.0);
            $table->bigInteger('like_count')->default(0);
            $table->bigInteger('dislike_count')->default(0);
            $table->string("about")->nullable();
            $table->string("what_to_expect")->nullable();
            $table->string("activity_infomation")->nullable();
            $table->string("insider_tip")->nullable();
            $table->string("how_to_use")->nullable();
            $table->string("how_to_get_there")->nullable();
            $table->string("cancellation")->nullable();
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
        Schema::dropIfExists('tourist_spots');
    }
}
