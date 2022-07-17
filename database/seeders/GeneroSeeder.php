<?php

namespace Database\Seeders;

use App\Models\Genero;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fem = new Genero();
        $fem->genero = "Femenino";
        $fem->save();

        $mas = new Genero();
        $mas->genero = "Masculino";
        $mas->save();
    }
}
