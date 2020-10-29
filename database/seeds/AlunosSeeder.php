<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlunosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alunos')->insert(["nome" => "Rogério", "curso" =>  "Informática", "turma" =>  "INFO03.2020"]);
        DB::table('alunos')->insert(["nome" => "Morgana", "curso" =>  "Informática", "turma" => "INFO03.2020"]);
        DB::table('alunos')->insert(["nome" => "Bianca", "curso" =>  "Informática", "turma" => "INFO03.2020"]);

        DB::table('curso')->insert(["nome" => "Informática", "abreviatura" => "INFO03.2020"]);
        DB::table('curso')->insert(["nome" => "Alimentos",  "abreviatura" => "ALI03.2020"]);
    }
}
