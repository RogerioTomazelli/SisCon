<?php

namespace App\Http\Controllers;

use App\FornecedorModel;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objFornecedor = FornecedorModel::orderBy("id")->get();
        return view('fornecedor.list')->with('fornecedores', $objFornecedor);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("fornecedor.create");
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
            'cnpj' => 'required',
            'telefone' => 'required',
            'email' => 'required',
            'estado' => 'required',
            'cidade' => 'required',
            'bairro' => 'required',
            'rua' => 'required',
            'numero' => 'required',
        ]);

        $objFornecedor = new FornecedorModel();
        $objFornecedor->nome = $request->nome;
        $objFornecedor->cnpj = $request->cnpj;
        $objFornecedor->telefone = $request->telefone;
        $objFornecedor->email = $request->email;
        $objFornecedor->estado = $request->estado;
        $objFornecedor->cidade = $request->cidade;
        $objFornecedor->bairro = $request->bairro;
        $objFornecedor->rua = $request->rua;
        $objFornecedor->numero = $request->numero;

        //dd($objFornecedor);

        $objFornecedor->save();

        return \redirect()->action('FornecedorController@index')->with('sucess', "Dados do fornecedor salvos!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FornecedorModel  $fornecedorModel
     * @return \Illuminate\Http\Response
     */
    public function show(FornecedorModel $fornecedorModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FornecedorModel  $fornecedorModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $objFornecedor = FornecedorModel::findorfail($id);
        return view('fornecedor.edit')->with('fornecedor', $objFornecedor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FornecedorModel  $fornecedorModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $request->validate([
            'nome' => 'required',
            'cnpj' => 'required',
            'telefone' => 'required',
            'email' => 'required',
            'estado' => 'required',
            'cidade' => 'required',
            'bairro' => 'required',
            'rua' => 'required',
            'numero' => 'required',
        ]);

        $objFornecedor = FornecedorModel::findorfail($request->id);
        $objFornecedor->nome = $request->nome;
        $objFornecedor->cnpj = $request->cnpj;
        $objFornecedor->telefone = $request->telefone;
        $objFornecedor->email = $request->email;
        $objFornecedor->estado = $request->estado;
        $objFornecedor->cidade = $request->cidade;
        $objFornecedor->bairro = $request->bairro;
        $objFornecedor->rua = $request->rua;
        $objFornecedor->numero = $request->numero;

        //dd($objFornecedor);

        $objFornecedor->save();

        return redirect()->action('FornecedorController@index')->with('sucess', "Dados do fornecedor editados!");
    }

    public function remove($id)
    {
        $objFornecedor = FornecedorModel::findOrFail($id);

        $objFornecedor->delete();

        return redirect()->action('FornecedorController@index')->with('sucess', "Fornecedor removido!");
    }

    public function search(Request $request)
    {
        if (!empty($request->nome)) {
            $objFornecedor = FornecedorModel::where('nome', 'like', '%' . $request->nome . '%')->get();
        } else if (!empty($request->cnpj)) {
            $objFornecedor = FornecedorModel::where('cnpj', 'like', '%' . $request->cnpj . '%')->get();
        } else {
            $objFornecedor = FornecedorModel::orderBy('id')->get();
        }

        return view('fornecedor.list')->with('fornecedores', $objFornecedor);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FornecedorModel  $fornecedorModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(FornecedorModel $fornecedorModel)
    {
        //
    }
}
