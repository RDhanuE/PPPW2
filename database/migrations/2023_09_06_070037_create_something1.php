<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSomething1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('something1', function (Blueprint $table) {
            $table -> increments("id_sesuatu");
            $table -> string("nama_sesuatu");
            $table -> integer("nilai_sesuatu");
            $table -> date("tanggal_sesuatu");
            $table -> integer("harga_sesuatu");
            $table -> timestamps();
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('something1');
    }
}
