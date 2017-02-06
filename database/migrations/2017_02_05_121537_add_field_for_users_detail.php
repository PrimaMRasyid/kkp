<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldForUsersDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('alamat')->nullable();
            $table->string('no_id')->nullable();
            $table->string('no_npwp')->nullable();
            $table->string('no_skib')->nullable();
            $table->date('tgl_skib')->nullable();
            $table->string('no_surveilance')->nullable();
            $table->date('tgl_surveilance')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('alamat');
            $table->dropColumn('no_id');
            $table->dropColumn('no_npwp');
            $table->dropColumn('no_skib');
            $table->dropColumn('tgl_skib');
            $table->dropColumn('no_surveilance');
            $table->dropColumn('tgl_surveilance');
        });
    }
}
