<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Siswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->bigInteger('nis')->unique();
            $table->string('nama');
            $table->string('umur');
            $table->string('kelas');
            $table->string('alamat');
            $table->unsignedbigInteger('id_user')->nullable()->index();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');            ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
}
