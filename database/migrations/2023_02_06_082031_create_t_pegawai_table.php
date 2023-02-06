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
        Schema::create('T_PEGAWAI', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->enum('jk', ['L', 'P']);
            $table->string('agama');
            $table->text('alamat');
            $table->string('kode_kelurahan');
            $table->string('kode_provinsi');
            $table->timestamps();

            $table->foreign('kode_kelurahan')->references('kode')->on('T_KELURAHAN')->onDelete('cascade');
            $table->foreign('kode_provinsi')->references('kode')->on('T_PROVINSI')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('T_PEGAWAI');
    }
};
