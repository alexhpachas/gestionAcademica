<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursoPeriodoGrupoDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso_periodo_grupo_docente', function (Blueprint $table) {
            $table->id();            
            $table->unsignedBigInteger('curso_periodo_grupo_id');
            $table->foreign('curso_periodo_grupo_id')->references('id')->on('curso_periodo_grupo')->onDelete('cascade');
            $table->foreignId('docente_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('curso_periodo_grupo_docentes');
    }
}
