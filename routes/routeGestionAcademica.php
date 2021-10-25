<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Livewire\Admin\Intranet\GestionAcademica\Ciclos\CiclosIndex;
use App\Http\Livewire\Admin\Intranet\GestionAcademica\Cursos\CursosIndex;
use App\Http\Livewire\Admin\Intranet\GestionAcademica\Entidades\EntidadesIndex;
use App\Http\Livewire\Admin\Intranet\GestionAcademica\Facultades\FacultadesIndex;
use App\Http\Livewire\Admin\Intranet\GestionAcademica\Grupos\GruposIndex;
use App\Http\Livewire\Admin\Intranet\GestionAcademica\Periodos\PeriodosIndex;
use App\Http\Livewire\Admin\Intranet\GestionAcademica\Planes\PlanesIndex;
use App\Http\Livewire\Admin\Intranet\GestionAcademica\Programas\ProgramasIndex;
use Illuminate\Support\Facades\Route;


Route::get('entidades', [EntidadesIndex::class,'index'])->name('entidades.index');

Route::get('planes', [PlanesIndex::class,'index'])->name('planes.index');

Route::get('periodos', [PeriodosIndex::class,'index'])->name('periodos.index');

Route::get('cursos', [CursosIndex::class,'index'])->name('cursos.index');

Route::get('ciclos', [CiclosIndex::class, 'index'])->name('ciclos.index');

Route::get('grupos', [GruposIndex::class, 'index'])->name('grupos.index');

Route::get('facultades', [FacultadesIndex::class,'index'])->name('facultades.index');

Route::get('programas', [ProgramasIndex::class,'index'])->name('programas.index');