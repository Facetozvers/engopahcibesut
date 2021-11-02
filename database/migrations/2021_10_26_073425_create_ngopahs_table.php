<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNgopahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ngopahs', function (Blueprint $table) {
            $table->id();
            $table->string('req_id')->unique();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('name');
            $table->string('phone_number');
            $table->string('alamat');
            $table->integer('rt');
            $table->integer('rw');
            $table->date('tanggal_pengambilan');
            $table->boolean('minyak_jelantah');
            $table->boolean('botol_plastik');
            $table->boolean('kardus');
            $table->float('botol_plastik_kg', 6, 2);
            $table->float('kardus_kg', 6, 2);
            $table->float('minyak_jelantah_liter', 6, 2);
            $table->string('status'); //pending, selesai
            $table->integer('number'); 
            $table->string('prefix'); 
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
        Schema::dropIfExists('ngopahs');
    }
}
