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
            $table->string('kategori');
            $table->text('layanan');
            $table->text('target');
            $table->integer('jumlah');
            $table->integer('total');
            $table->enum('status', ['pending', 'proses', 'selesai']);
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
        Schema::dropIfExists('order_layanans');
    }
}
