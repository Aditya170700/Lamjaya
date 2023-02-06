<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('T_KELURAHAN', function (Blueprint $table) {
            $table->string('kode_kecamatan')->after('kode');

            $table->foreign('kode_kecamatan')->references('kode')->on('T_KECAMATAN')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('TB_KELURAHAN', function (Blueprint $table) {
            //
        });
    }
};
