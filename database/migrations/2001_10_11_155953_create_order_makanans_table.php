<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderMakanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_makanans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tlp');
            $table->longText('alamat');
            $table->string('email')->unique()->nullable();
            $table->enum('menu', ['coffee beer', 'sarsaparila', 'temulawak', 'kebab', 'seblak', 'burger', 'ayam bakar', 'ayam bakar + nasi']);
            $table->integer('qty');
            $table->integer('harga');
            $table->integer('total_harga');
            $table->string('bukti_pembayaran');
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
        Schema::dropIfExists('order_makanans');
    }
}
