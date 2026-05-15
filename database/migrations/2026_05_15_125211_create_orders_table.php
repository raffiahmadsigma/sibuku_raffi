<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('book_id')
                ->constrained()
                ->onDelete('cascade');

            $table->string('nama');

            $table->string('nomor_hp');

            $table->text('alamat');

            $table->string('ekspedisi');

            $table->integer('ongkir');

            $table->string('metode_pembayaran');

            $table->integer('harga_buku');

            $table->integer('total_harga');

            $table->string('status')
                ->default('Menunggu Pembayaran');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};