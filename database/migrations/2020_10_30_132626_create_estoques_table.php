<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstoquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estoques', function (Blueprint $table) {
            $table->id();
            $table->integer('produto_id')->unsigned()->nullable();
            $table->integer('fornecedor_id')->unsigned()->nullable();
            $table->dateTime('data');
            $table->string('quantidade');
            $table->string('preco_unit');
            $table->string('preco_total');
            $table->string('peso_unit');
            $table->string('unidade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estoques');
    }
}
