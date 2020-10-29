<?php

namespace App\Http\Controllers;

use App\EstoqueModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EstoqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::get('http://localhost:8000/api/estoque');
        $objEstoque = json_decode(json_encode($response->json()));
        return view('estoque.list')->with('estoques', $objEstoque);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("estoque.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'produto_id' => 'required',
            'fornecedor_id' => 'required',
            'data' => 'required',
            'quantidade' => 'required',
            'preco_unit' => 'required',
            'preco_total' => 'required',
            'peso_unit' => 'required',
            'unidade' => 'required',
        ]);

        $objEstoque = new EstoqueModel();
        $objEstoque->produto_id = $request->produto_id;
        $objEstoque->fornecedor_id = $request->fornecedor_id;
        $objEstoque->data = $request->data;
        $objEstoque->quantidade = $request->quantidade;
        $objEstoque->preco_unit = $request->preco_unit;
        $objEstoque->preco_total = $request->preco_total;
        $objEstoque->peso_unit = $request->peso_unit;
        $objEstoque->unidade = $request->unidade;

        //dd($objEstoque);

        $objEstoque->save();

        return \redirect()->action('EstoqueController@index')->with('sucess', "Dados do estoque salvos!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EstoqueModel  $estoqueModel
     * @return \Illuminate\Http\Response
     */
    public function show(EstoqueModel $estoqueModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EstoqueModel  $estoqueModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $objEstoque = EstoqueModel::findorfail($id);
        return view('estoque.edit')->with('estoque', $objEstoque);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EstoqueModel  $estoqueModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EstoqueModel $estoqueModel)
    {
        $request->validate([
            'produto_id' => 'required',
            'fornecedor_id' => 'required',
            'data' => 'required',
            'quantidade' => 'required',
            'preco_unit' => 'required',
            'preco_total' => 'required',
            'peso_unit' => 'required',
            'unidade' => 'required',
        ]);

        $objEstoque = EstoqueModel::findorfail($request->id);
        $objEstoque->produto_id = $request->produto_id;
        $objEstoque->fornecedor_id = $request->fornecedor_id;
        $objEstoque->data = $request->data;
        $objEstoque->quantidade = $request->quantidade;
        $objEstoque->preco_unit = $request->preco_unit;
        $objEstoque->preco_total = $request->preco_total;
        $objEstoque->peso_unit = $request->peso_unit;
        $objEstoque->unidade = $request->unidade;

        //dd($objEstoque);

        $objEstoque->save();

        return redirect()->action('EstoqueController@index')->with('sucess', "Dados do estoque editados!");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EstoqueModel  $estoqueModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(EstoqueModel $estoqueModel)
    {
        //
    }

    public function remove($id)
    {
        $objEstoque = EstoqueModel::findOrFail($id);

        $objEstoque->delete();
        
        return redirect()->action('FornecedorController@index')->with('sucess', "Item do estoque removido!");
    }

    public function search(Request $request)
    {
        if (!empty($request->nome)) {
            $objEstoque = EstoqueModel::where('nome', 'like', '%' . $request->nome . '%')->get();
        } else if (!empty($request->cnpj)) {
            $objEstoque = EstoqueModel::where('cnpj', 'like', '%' . $request->cnpj . '%')->get();
        } else {
            $objEstoque = EstoqueModel::orderBy('id')->get();
        }

        return view('estoque.list')->with('estoque', $objEstoque);
    }

}
