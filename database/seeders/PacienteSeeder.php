<?php

namespace Database\Seeders;

use App\Models\Genero;
use App\Models\Paciente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $generos = [];
    
        foreach(Genero::select('id')->get() as $g) {
            array_push($generos, $g->id);
        }

        for ($i = 0; $i < 30; $i ++) {
            $genero = fake()->randomElement($generos);

            $paciente = new Paciente();
            $paciente->nss = fake()->randomNumber(9, true);
            $paciente->nombre = (($genero == 1)? fake()->firstNameFemale() : fake()->firstNameMale());
            $paciente->apellido_paterno = fake()->lastName();
            $paciente->apellido_materno = fake()->lastName();
            $paciente->telefono = fake()->phoneNumber();
            $paciente->genero_id = $genero;

            $paciente->save();
        }
    }
}
