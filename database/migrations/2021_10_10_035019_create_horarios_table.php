<?php

use App\Models\admin\intranet\gestion_academica\Horario;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->string('dia');
            $table->string('hora_inicio');
            $table->string('hora_fin');
            $table->enum('estado',[Horario::ACTIVO,Horario::INACTIVO])->default(Horario::ACTIVO);            
            $table->unsignedBigInteger('curso_periodo_grupo_id');
            $table->foreign('curso_periodo_grupo_id')->references('id')->on('curso_periodo_grupo')->onDelete('cascade');
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
        Schema::dropIfExists('horarios');
    }
}
