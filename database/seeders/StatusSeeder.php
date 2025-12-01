<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nome_status' => 'Aguardando Mexer', // 1
            ],
            [
                'nome_status' => 'Em Andamento', // 2
            ],
            [
                'nome_status' => 'Aguardando Peças', // 3
            ],
            [
                'nome_status' => 'Laudo Concluído', // 4
            ],
            [
                'nome_status' => 'Finalizado', // 5 
            ],
        ];
        DB::table('status')->insert($data);
    }
}
