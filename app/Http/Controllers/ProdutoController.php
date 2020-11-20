<?php

namespace App\Http\Controllers;

use App\ProdutoModel;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objProduto = ProdutoModel::orderBy("id")->get();
        return view('produto.list')->with('produtos', $objProduto);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("produto.create");
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
            'nome' => 'required|max:100',
            'categoria' => 'required',
        ]);

        $objProduto = new ProdutoModel();
        $objProduto->nome = $request->nome;
        $objProduto->categoria = $request->categoria;
        $objProduto->descricao = $request->descricao;

        //dd($objProduto);

        $objProduto->save();

        return \redirect()->action('ProdutoController@index')->with('sucess', "Dados do produto salvos!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProdutoModel  $produtoModel
     * @return \Illuminate\Http\Response
     */
    public function show(ProdutoModel $produtoModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProdutoModel  $produtoModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $objProduto = ProdutoModel::findorfail($id);
        return view('produto.edit')->with('produto', $objProduto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProdutoModel  $produtoModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $request->validate([
            'nome' => 'required|max:100',
            'categoria' => 'required',
        ]);
        $objProduto = ProdutoModel::findOrfail($request->id);
        $objProduto->nome = $request->nome;
        $objProduto->categoria = $request->categoria;
        $objProduto->descricao = $request->descricao;

        $objProduto->update();

        return redirect()->action('ProdutoController@index')
            ->with('success', 'Dados do produto editados.');
    }

    public function remove($id)
    {
        $objProduto = ProdutoModel::findOrFail($id);

        $objProduto->delete();

        return redirect()->action('ProdutoController@index')->with('sucess', "Produto removido!");
    }

    public function search(Request $request)
    {
        if (!empty($request->nome)) {
            $objProduto = ProdutoModel::where('nome', 'like', '%' . $request->nome . '%')->get();
        } else if (!empty($request->categoria)) {
            $objProduto = ProdutoModel::where('categoria', 'like', '%' . $request->categoria . '%')->get();
        } else {
            $objProduto = ProdutoModel::orderBy('id')->get();
        }

        return view('produto.list')->with('produtos', $objProduto);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProdutoModel  $produtoModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdutoModel $produtoModel)
    {
        //
    }
}
