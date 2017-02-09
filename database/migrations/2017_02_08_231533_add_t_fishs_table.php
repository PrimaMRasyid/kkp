<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTFishsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fishs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hs_code');
            $table->string('name');
            $table->string('latin_name');
            $table->integer('size');
            $table->integer('qty');
            $table->string('unit');
            $table->string('value');
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
        Schema::dropIfExists('fishs');
    }
}
