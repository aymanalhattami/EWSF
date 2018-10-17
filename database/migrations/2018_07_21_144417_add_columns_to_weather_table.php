<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToWeatherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('weathers', function (Blueprint $table){
            $table->string("outlook");
            $table->string("temp");
            $table->string("pressure");
            $table->string("humidity");
            $table->string("temp_min");
            $table->string("temp_max");
            $table->string("sea_level");
            $table->string("grnd_level");
            $table->string("day");
            $table->string("wind_speed");
            $table->string("wind_degree");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('weathers', function (Blueprint $table){
            $table->dropColumn("outlook");
            $table->dropColumn("temp");
            $table->dropColumn("pressure");
            $table->dropColumn("humidity");
            $table->dropColumn("temp_min");
            $table->dropColumn("temp_max");
            $table->dropColumn("sea_level");
            $table->dropColumn("grnd_level");
            $table->dropColumn("day");
            $table->dropColumn("wind_speed");
            $table->dropColumn("wind_degree");
        });
    }
}
