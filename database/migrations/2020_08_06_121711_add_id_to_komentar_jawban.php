<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdToKomentarJawban extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('komentar_jawban', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('jawaban_id');

            $table->foreign('jawaban_id')->references('id')->on('jawaban');
            $table->unsignedBigInteger('profil_id');

            $table->foreign('profil_id')->references('id')->on('profiles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('komentar_jawban', function (Blueprint $table) {
            //
            $table->dropForeign(['jawaban_id']);
            $table->dropColumn(['jawaban_id']);
            $table->dropForeign(['profil_id']);
            $table->dropColumn(['profil_id']);
        });
    }
}
