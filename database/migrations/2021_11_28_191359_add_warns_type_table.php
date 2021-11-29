<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWarnsTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warn_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index();
            $table->timestamps();
        });

        Schema::table('warns', function (Blueprint $table) {
            $table->foreign('warn_name')->references('name')->on('warn_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('warn_types');

        Schema::table('warns', function (Blueprint $table) {
            $table->dropForeign(['warn_name']);
        });
    }
}
