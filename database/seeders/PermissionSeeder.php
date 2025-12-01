<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // CLIENTE - ORDEM DE SERVIÇOS
            ['role_id' => 1, 'resource_id' => 1, 'permission' => 0],//LISTAR
            ['role_id' => 1, 'resource_id' => 2, 'permission' => 0],//CRIAR
            ['role_id' => 1, 'resource_id' => 3, 'permission' => 1],//VER POR ID
            ['role_id' => 1, 'resource_id' => 4, 'permission' => 0],//EDITAR
            ['role_id' => 1, 'resource_id' => 5, 'permission' => 0],//DELETAR
            // CLIENTE - CLIENTE
            ['role_id' => 1, 'resource_id' => 6, 'permission' => 0],//LISTAR
            ['role_id' => 1, 'resource_id' => 7, 'permission' => 0],//CRIAR
            ['role_id' => 1, 'resource_id' => 8, 'permission' => 1],//VER POR ID
            ['role_id' => 1, 'resource_id' => 9, 'permission' => 1],//EDITAR
            ['role_id' => 1, 'resource_id' =>10, 'permission' => 0],//DELETAR
            // TECNICO - ORDEM DE SERVIÇOS
            ['role_id' => 2, 'resource_id' => 1, 'permission' => 1],//LISTAR
            ['role_id' => 2, 'resource_id' => 2, 'permission' => 1],//CRIAR
            ['role_id' => 2, 'resource_id' => 3, 'permission' => 1],//VER POR ID
            ['role_id' => 2, 'resource_id' => 4, 'permission' => 1],//EDITAR
            ['role_id' => 2, 'resource_id' => 5, 'permission' => 1],//DELETAR
            // TECNICO - CLIENTE
            ['role_id' => 2, 'resource_id' => 6, 'permission' => 1],//LISTAR
            ['role_id' => 2, 'resource_id' => 7, 'permission' => 1],//CRIAR
            ['role_id' => 2, 'resource_id' => 8, 'permission' => 1],//VER POR ID
            ['role_id' => 2, 'resource_id' => 9, 'permission' => 1],//EDITAR
            ['role_id' => 2, 'resource_id' =>10, 'permission' => 1],//DELETAR
        ];
        DB::table('permissions')->insert($data);
    }
}
