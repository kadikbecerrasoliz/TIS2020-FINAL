<?php

use Illuminate\Database\Seeder;
use App\Materia;

class MateriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Materia::create([
            'name'          => 'Introduccion a la programacion',
            'codigo'        => '12345678'
        ]);
        Materia::create([
            'name'          => 'Elementos de la programacion',
            'codigo'        => '12345679'
        ]);
    }
}
