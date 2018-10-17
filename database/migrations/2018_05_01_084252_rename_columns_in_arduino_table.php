<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnsInArduinoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('arduino', function (Blueprint $table){
            $table->renameColumn('`arduino-1`', 'arduino_1');
            $table->renameColumn('`arduino-2`', 'arduino_2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('arduino', function (Blueprint $table){
            $table->renameColumn('arduino_1', '`arduino-1`');
            $table->renameColumn('arduino_2', '`arduino-2`');
        });
    }
}
