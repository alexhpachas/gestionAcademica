<?php

use App\Models\admin\intranet\gestion_academica\DocentePeriodo;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocentePeriodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docente_periodos', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->enum('estado',[DocentePeriodo::DOCENTE,DocentePeriodo::JEFE_PRACTICA])->default(DocentePeriodo::DOCENTE);
            $table->string('centro_estudio');
            $table->foreignId('docente_grado_id')->constrained()->onDelete('cascade');
            $table->foreignId('docente_tipo_id')->constrained()->onDelete('cascade');
            $table->foreignId('regimen_dedicacion_id')->constrained()->onDelete('cascade');
            $table->foreignId('docente_categoria_id')->constrained()->onDelete('cascade');
            $table->foreignId('periodo_id')->constrained()->onDelete('cascade');
            $table->foreignId('facultade_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('docente_periodos');
    }
}
