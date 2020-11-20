<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produto')->insert(["nome" => "Geladeira", "categoria" =>  "Eletrodoméstico", "descricao" =>  "Branca"]);
        DB::table('produto')->insert(["nome" => "Fogão", "categoria" =>  "Eletrodoméstico", "descricao" => "Preto"]);
        DB::table('produto')->insert(["nome" => "Televisão", "categoria" =>  "Eletrodoméstico", "descricao" => "6 bocas. Preto"]);
    }
}
