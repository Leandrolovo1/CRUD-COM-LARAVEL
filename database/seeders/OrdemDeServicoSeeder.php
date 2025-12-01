<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class OrdemDeServicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // ORDEM DE SERVIÇO
            [
                'defeito_pedido' => 'Formatação sem backup', 
                'laudo' => '',
                'foto' => '', 
                'user_id' => '1', 
                'status_id' => '1', 
                'tipo_maquinas_id' => '1'
            ],
            [
                'defeito_pedido' => 'Formatação', 
                'laudo' => '',
                'foto' => '', 
                'user_id' => '2', 
                'status_id' => '2', 
                'tipo_maquinas_id' => '2'
            ],
        ];
        DB::table('ordem_servico')->insert($data);
    }
}
