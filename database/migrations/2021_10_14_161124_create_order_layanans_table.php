<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderLayanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_layanans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('kategori');
            $table->text('layanan');
            $table->text('target');
            $table->text('slug')->unique()->nullable();
            $table->integer('jumlah');
            $table->integer('total');
            $table->enum('status', ['pending', 'proses', 'selesai']);
            $table->string('bukti')->nullable();
            $table->enum('pembayaran', ['belum', 'sudah']);
            $table->date('tgl');
            $table->timestamps();

            // Relasi User
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_layanans');
    }
}
