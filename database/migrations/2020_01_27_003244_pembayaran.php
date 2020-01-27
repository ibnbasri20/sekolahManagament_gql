<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pembayaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_jenis')->index();
            $table->unsignedBigInteger('id_siswa')->index();
            $table->integer('dibayar');
            $table->timestamp('tgl_pembayaran');
            $table->foreign('id_jenis')->references('id')->on('jenis_pembayaran')->onDelete('cascade');
            $table->foreign('id_siswa')->references('id')->on('siswa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayaran');
    }
}
