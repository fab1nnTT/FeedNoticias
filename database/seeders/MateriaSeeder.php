<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Certifique-se de importar a classe DB corretamente
use Database\Seeders\MateriaSeeder;


class MateriaSeeder extends Seeder
{
    public function run()
    {
        factory(App\Models\Materia::class, 20)->create(); // Cria 10 registros usando a factory
    }
}
