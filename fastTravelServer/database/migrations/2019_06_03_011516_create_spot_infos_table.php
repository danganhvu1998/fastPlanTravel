<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpotInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spot_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->bigInteger("spot_id");
            $table->string("language", 5)->default("en");
            $table->string("name");
            $table->text("about");
            $table->text("what_to_expect")->nullable();
            $table->text("activity_infomation")->nullable();
            $table->text("insider_tip")->nullable();
            $table->text("how_to_use")->nullable();
            $table->text("how_to_get_there")->nullable();
            $table->text("cancellation")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spot_infos');
    }
}
