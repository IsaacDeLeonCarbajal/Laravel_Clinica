<?php

namespace Database\Seeders;

use App\Models\Consulta;
use App\Models\Doctor;
use App\Models\Paciente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConsultaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pacientes = [];

        foreach(Paciente::select('id')->get() as $p) {
            array_push($pacientes, $p->id);
        }

        $doctores = [];

        foreach(Doctor::select('id')->get() as $d) {
            array_push($doctores, $d->id);
        }

        for ($i = 0; $i < 50; $i ++) {
            $consulta = new Consulta();
            $consulta->doctor_id = fake()->randomElement($doctores);
            $consulta->paciente_id = fake()->randomElement($pacientes);
            $consulta->padecimiento = fake()->text(70);
            $consulta->tratamiento = fake()->text(70);
            $consulta->fecha = fake()->date();

            $consulta->save();
        }
    }
}
