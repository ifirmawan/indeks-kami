<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKategoriSEsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori_s_es', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor')->nullable();
            $table->unsignedInteger('identitas_responden_id');
            $table->unsignedInteger('parameter_id');
            $table->enum('skor', ['A', 'B', 'C'])->nullable();
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
        Schema::dropIfExists('kategori_s_es');
    }
}
