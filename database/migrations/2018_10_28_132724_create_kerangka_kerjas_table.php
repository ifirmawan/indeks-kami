<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKerangkaKerjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kerangka_kerjas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('identitas_responden_id');
            $table->unsignedInteger('parameter_id');
            $table->string('nomor')->nullable();
            $table->string('skor')->default(0);
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
        Schema::dropIfExists('kerangka_kerjas');
    }
}
