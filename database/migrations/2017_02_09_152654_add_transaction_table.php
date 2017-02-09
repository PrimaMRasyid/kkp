<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sender');
            $table->string('sender_address');
            $table->string('jenis_komoditas');
            $table->string('peruntukan');
            $table->string('receiver')->nullable();
            $table->string('receiver_address')->nullable();
            $table->string('nama_umum');
            $table->integer('ukuran');
            $table->integer('qty');
            $table->string('satuan');
            $table->string('keterangan');
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
        Schema::dropIfExists('transactions');
    }
}
