<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // ORDEM DE SERVIÇO
            ['name' => 'ordemServicos.index'], // 1
            ['name' => 'ordemServicos.create'], // 2
            ['name' => 'ordemServicos.show'], // 3
            ['name' => 'ordemServicos.edit'], // 4
            ['name' => 'ordemServicos.delete'], // 5
            // USUARIOS
            ['name' => 'clientes.index'], // 6
            ['name' => 'clientes.create'], // 7
            ['name' => 'clientes.show'], // 8
            ['name' => 'clientes.edit'], // 9
            ['name' => 'clientes.delete'], // 10
        ];
        DB::table('resources')->insert($data);
    }
}
