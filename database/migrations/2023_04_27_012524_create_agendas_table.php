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
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('division_id');
            $table->string('nama_agenda');
            $table->string('perihal');
            $table->text('notulensi')->nullable();
            $table->dateTime('waktu_pelaksanaan')->nullable();
            $table->string('tempat_pelaksanaan');
            $table->string('link_dokumentasi')->nullable();
            // kurang cetak laporan
            $table->dateTime('tanggal_selesai')->nullable();
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
        Schema::dropIfExists('agendas');
    }
};
