<?php

use App\Models\admin\intranet\gestion_academica\Persona;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('lastname_paternal');
            $table->string('lastname_maternal');
            $table->string('firstname');
            $table->enum('document_type', ['DNI', 'PAS', 'CE', 'CI']);
            $table->char('document_number');
            $table->date('birthdate');
            $table->string('email');
            $table->string('gender');
            $table->enum('status',[Persona::ACTIVO,Persona::INACTIVO])->default(Persona::ACTIVO);
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
        Schema::dropIfExists('personas');
    }
}
