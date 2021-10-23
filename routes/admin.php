<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Livewire\Admin\Intranet\GestionAcademica\Entidades\EntidadesIndex;
use App\Http\Livewire\Admin\Intranet\GestionAcademica\Periodos\PeriodosIndex;
use App\Http\Livewire\Admin\Intranet\GestionAcademica\Planes\PlanesIndex;
use Illuminate\Support\Facades\Route;


Route::get('', [HomeController::class,'index'])->name('admin.home');

Route::get('entidades', [EntidadesIndex::class,'index'])->name('entidades.index');

Route::get('planes', [PlanesIndex::class,'index'])->name('planes.index');

Route::get('periodos', [PeriodosIndex::class,'index'])->name('periodos.index');
