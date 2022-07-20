<?php

use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PacienteController;
use App\Models\Consulta;
use App\Models\Doctor;
use App\Models\Especialidad;
use App\Models\Genero;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', fn () => view('home'))->name('home');

Route::controller(PacienteController::class)->group(function () {
    Route::get('/pacientes', 'index')->name('pacientes.index');

    Route::get('/pacientes/create', 'create')->name('pacientes.create');

    Route::post('/pacientes', 'store')->name('pacientes.store');
    
    Route::get('/pacientes/{paciente}', 'show')->name('pacientes.show');

    Route::get('/pacientes/{paciente}/edit', 'edit')->name('pacientes.edit');

    Route::put('/pacientes/{paciente}', 'update')->name('pacientes.update');

    Route::delete('/pacientes/{paciente}', 'destroy')->name('pacientes.destroy');
});

Route::controller(DoctorController::class)->group(function () {
    Route::get('/doctores', 'index')->name('doctores.index');

    Route::get('/doctores/create', 'create')->name('doctores.create');

    Route::post('/doctores', 'store')->name('doctores.store');
    
    Route::get('/doctores/{doctor}', 'show')->name('doctores.show');

    Route::get('/doctores/{doctor}/edit', 'edit')->name('doctores.edit');

    Route::put('/doctores/{doctor}', 'update')->name('doctores.update');

    Route::delete('/doctores/{doctor}', 'destroy')->name('doctores.destroy');

    Route::post('/doctores/por_especialidad', 'doctoresPorEspecialidad')->name('doctores.por_especialidad');
});

Route::controller(ConsultaController::class)->group(function () {
    Route::get('/consultas', 'index')->name('consultas.index');
    
    Route::get('/consultas/create', 'create')->name('consultas.create');

    Route::post('/consultas', 'store')->name('consultas.store');
    
    Route::get('/consultas/{consulta}', 'show')->name('consultas.show');

    Route::get('/consultas/{consulta}/edit', 'edit')->name('consultas.edit');

    Route::put('/consultas/{consulta}', 'update')->name('consultas.update');
    
    Route::delete('/consultas/{consulta}', 'destroy')->name('consultas.destroy');
});

Route::get('/tests', function(Request $r) {
    $registro = Especialidad::select('id')->pluck('id');

    return $registro;
});

Route::get('/faker_test', function() {
    $faker = Faker\Factory::create(); //Obtener una instancia de Faker

    for ($i=0; $i < 20; $i++) { 
        echo $faker->date('Y-m-d') . "<br>";
    }

    // return $faker->numberBetween(1, 2);
});
