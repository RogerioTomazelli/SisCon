<?php

namespace App\Http\Controllers;

use App\EstoqueModel;
use App\FornecedorModel;
use App\ProdutoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EstoqueController extends Controller
{
    private $url = "http://localhost:8003/api/estoque/";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* IMPORTANTE!!!!
        
        Iniciar no VS Code: http://localhost:8001/api/estoque (para a aplicação)
        Iciciar no GitBash: http://localhost:8002/api/estoque (para a API)

        */
        //$response = Http::get('http://localhost:8000/api/estoque');
        $response = Http::get($this->url);
        $objEstoque = json_decode(json_encode($response->json()));
        $objEstoque = EstoqueModel::orderBy("id")->get();
        return view('estoque.list')->with('estoques', $objEstoque);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $objProdutos = ProdutoModel::orderBy('id')->get();
        $objFornecedores = FornecedorModel::orderBy('id')->get();
        return view("estoque.create")
            ->with('produtos', $objProdutos)
            ->with('fornecedores', $objFornecedores);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = Http::post($this->url . "store", [

            'produto_id' => $request->produto_id,
            'fornecedor_id' => $request->fornecedor_id,
            'data' => $request->data,
            'quantidade' => $request->quantidade,
            'preco_unit' => $request->preco_unit,
            'preco_total' => $request->preco_total,
            'peso_unit' => $request->peso_unit,
            'unidade' => $request->unidade,

        ]);

        /*'produto_id' => 'required',
        'fornecedor_id' => 'required',
        'data' => 'required',
        'quantidade' => 'required',
        'preco_unit' => 'required',
        'preco_total' => 'required',
        'peso_unit' => 'required',
        'unidade' => 'required',*/

        /*$objEstoque = new EstoqueModel();
        $objEstoque->produto_id = $request->produto_id;
        $objEstoque->fornecedor_id = $request->fornecedor_id;
        $objEstoque->data = $request->data;
        $objEstoque->quantidade = $request->quantidade;
        $objEstoque->preco_unit = $request->preco_unit;
        $objEstoque->preco_total = $request->preco_total;
        $objEstoque->peso_unit = $request->peso_unit;
        $objEstoque->unidade = $request->unidade;*/

        //dd($objEstoque);

        //$objEstoque->save();

        return redirect()->action('EstoqueController@index')->with('sucess', "Dados do estoque salvos!");
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
        $response = Http::get($this->url . $id);
        //$objEstoque = EstoqueModel::findorfail($id);
        $objEstoque = json_decode(json_encode($response->json()));
        $objProdutos = ProdutoModel::orderBy('id')->get();
        $objFornecedores = FornecedorModel::orderBy('id')->get();

        return view('estoque.edit')->with(['estoque' => $objEstoque, 'produtos' => $objProdutos, 'fornecedores' => $objFornecedores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EstoqueModel  $estoqueModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $response = Http::put($this->url . "update/" . $request->id, [
            'produto_id' => $request->produto_id,
            'fornecedor_id' => $request->fornecedor_id,
            'data' => $request->data,
            'quantidade' => $request->quantidade,
            'preco_unit' => $request->preco_unit,
            'preco_total' => $request->preco_total,
            'peso_unit' => $request->peso_unit,
            'unidade' => $request->unidade,
        ]);


        if ($response->ok()) {
            return redirect()->action('EstoqueController@index')->with('sucess', "Dados do estoque editados!");
        } else {
            dd($response);
        }

        /*$objEstoque = EstoqueModel::findorfail($request->id);
        $objEstoque->produto_id = $request->produto_id;
        $objEstoque->fornecedor_id = $request->fornecedor_id;
        $objEstoque->data = $request->data;
        $objEstoque->quantidade = $request->quantidade;
        $objEstoque->preco_unit = $request->preco_unit;
        $objEstoque->preco_total = $request->preco_total;
        $objEstoque->peso_unit = $request->peso_unit;
        $objEstoque->unidade = $request->unidade;*/

        //dd($objEstoque);

        //$objEstoque->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EstoqueModel  $estoqueModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = Http::delete($this->url . $id);
        return redirect()->action('EstoqueController@index')
            ->with('success', 'Item do estoque vendido!');
    }

    /*public function remove($id)
    {
        $objEstoque = EstoqueModel::findOrFail($id);

        $objEstoque->delete();

        return redirect()->action('EstoqueController@index')->with('sucess', "Item do estoque removido!");
    }*/

    public function search(Request $request)
    {
        /*if (!empty($request->produto_id)) {
            $objEstoque = EstoqueModel::where('produto_id', 'like', '%' . $request->produto_id . '%')->get();
        } else if (!empty($request->fornecedor_id)) {
            $objEstoque = EstoqueModel::where('fornecedor_id', 'like', '%' . $request->fornecedor_id . '%')->get();
        } else {
            $objEstoque = EstoqueModel::orderBy('id')->get();
        }

        return view('estoque.list')->with('estoques', $objEstoque);*/

        $response = Http::post($this->url . "search", [
            'produto_id' => $request->produto_id,
        ]);

        $objEstoque = json_decode(json_encode($response->json()));

        return view('estoque.list')->with('estoques', $objEstoque);
    }
}
