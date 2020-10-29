<?php

namespace App\Http\Controllers\Api;

use App\EstoqueModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstoqueApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objEstoque = EstoqueModel::orderBy('Id')->get();
        return $objEstoque;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return EstoqueModel::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EstoqueModel  $estoqueModel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $objEstoque = EstoqueModel::findOrFail($id);
        return $objEstoque;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EstoqueModel  $estoqueModel
     * @return \Illuminate\Http\Response
     */
    public function edit(EstoqueModel $estoqueModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EstoqueModel  $estoqueModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $objEstoque = EstoqueModel::findOrFail($id);
        return $objEstoque->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EstoqueModel  $estoqueModel
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $objEstoque = EstoqueModel::findOrFail($id);
        return $objEstoque->delete();
    }
    
    /*
    public function search(Request $request)
    {
        $query = DB::table('turma');
        if(!empty($request->nome)){
            $query->where('nome', 'like', "%" . $request->nome . "%");
        }

        if(!empty($request->sigla)){
            $query->where('sigla', 'like', "%" . $request->sigla . "%");
        }
        $objEstoque = $query->orderBy('id')->get();
        return $objEstoque;
    }
    */
}
