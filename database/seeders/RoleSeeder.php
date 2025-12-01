<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'CLIENTE'], // 1
            ['name' => 'TECNICO'], // 2
        ];
        DB::table('roles')->insert($data);
    }
}
