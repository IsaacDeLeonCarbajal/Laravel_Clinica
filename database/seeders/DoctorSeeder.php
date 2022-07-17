<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Especialidad;
use App\Models\Genero;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $especialidades = [];

        foreach(Especialidad::select('id')->get() as $e) {
            array_push($especialidades, $e->id);
        }

        $generos = [];
    
        foreach(Genero::select('id')->get() as $g) {
            array_push($generos, $g->id);
        }

        for ($i = 0; $i < 20; $i ++) {
            $genero = fake()->randomElement($generos);

            $doctor = new Doctor();
            $doctor->cedula = fake()->randomNumber(9, true);
            $doctor->nombre = (($genero == 1)? fake()->firstNameFemale() : fake()->firstNameMale());
            $doctor->apellido_paterno = fake()->lastName();
            $doctor->apellido_materno = fake()->lastName();
            $doctor->telefono = fake()->phoneNumber();
            $doctor->sueldo = fake()->randomFloat(2, 1000, 20000);
            $doctor->genero_id = $genero;
            $doctor->especialidad_id = fake()->randomElement($especialidades);

            $doctor->save();
        }
    }
}
