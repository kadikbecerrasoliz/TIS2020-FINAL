<?php

use Illuminate\Database\Seeder;
use App\Codigo;

class CodigosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Codigo::create([
            'codigo'      => '12345678'
        ]);
    }
}
