<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBelongToImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('images', function (Blueprint $table) {
            $table->bigInteger('level_1_spot_id')->default(0);#0 is the earth
            $table->bigInteger('level_2_spot_id')->default(0);#0 is the earth
            $table->bigInteger('level_3_spot_id')->default(0);#0 is the earth
            $table->bigInteger('level_4_spot_id')->default(0);#0 is the earth
            $table->bigInteger('level_5_spot_id')->default(0);#0 is the earth
            $table->bigInteger('level_6_spot_id')->default(0);#0 is the earth
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('images', function (Blueprint $table) {
            $table->dropColumn('level_1_spot_id');
            $table->dropColumn('level_2_spot_id');
            $table->dropColumn('level_3_spot_id');
            $table->dropColumn('level_4_spot_id');
            $table->dropColumn('level_5_spot_id');
            $table->dropColumn('level_6_spot_id');
        });
    }
}
