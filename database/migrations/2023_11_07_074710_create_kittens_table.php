<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kittens', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kittens');
            $table->string('path')->nullable();
            $table->string('kitten_seo')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('foto');
            $table->unsignedBigInteger('something1_id');
            $table->foreign('something1_id')
                ->references('id_sesuatu')
                ->on('something1')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kittens');
    }
};
