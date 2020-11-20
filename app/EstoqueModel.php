<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstoqueModel extends Model
{
    //CRUD API -> por os campos
    protected $table = "estoques";
    protected $fillable = [
        'produto_id', 'fornecedor_id', 'data',
        'quantidade', 'preco_unit', 'preco_total', 'peso_unit', 'unidade',
    ];


    public function produto()
    {
        return $this->belongsTo(ProdutoModel::class, 'produto_id', 'id');
    }

    public function fornecedor()
    {
        return $this->belongsTo(FornecedorModel::class, 'fornecedor_id', 'id');
    }
}
