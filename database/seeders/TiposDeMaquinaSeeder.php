<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TiposDeMaquinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'tipo_maquina' => 'Computador', // 1
            ],
            [
                'tipo_maquina' => 'Notebook', // 2
            ],
            [
                'tipo_maquina' => 'Impressora', // 3
            ],
            [
                'tipo_maquina' => 'Celular', // 4
            ],
            [
                'tipo_maquina' => 'Video-game', // 5 
            ],
        ];
        DB::table('tipo_maquinas')->insert($data);
    }
}
