<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CursoSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ["nome" => "TÉCNICO EM INFORMÁTICA",
            "duracao" => 4],
            ["nome" => "TÉCNICO EM MEIO AMBIENTE",
            "duracao" => 4],
            ["nome" => "TÉCNICO EM MECÂNICA",
            "duracao" => 4],
            ["nome" => "TÉCNICO EM PRODUÇÃO CULTURAL",
            "duracao" => 4],
        ];
        
        DB::table('cursos')->insert($data);
    }
}
