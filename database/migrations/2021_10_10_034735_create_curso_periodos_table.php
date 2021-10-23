<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursoPeriodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso_periodos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('curso_programa_plane_id');
            $table->foreign('curso_programa_plane_id')->references('id')->on('curso_programa_planes')->onDelete('cascade');
            $table->foreignId('periodo_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('curso_periodos');
    }
}
