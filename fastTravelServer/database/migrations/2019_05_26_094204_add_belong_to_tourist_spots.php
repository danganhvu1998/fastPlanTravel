<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBelongToTouristSpots extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tourist_spots', function (Blueprint $table) {
            $table->bigInteger('upper_spot_id')->default(0);#0 is the earth
            $table->bigInteger('upper_spot1_id')->default(0);#0 is the earth
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tourist_spots', function (Blueprint $table) {
            $table->dropColumn('upper_spot_id');
            $table->dropColumn('upper_spot1_id');
        });
    }
}
