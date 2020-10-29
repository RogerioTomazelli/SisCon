<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\TurmaModel;
use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TurmaApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objTurma = TurmaModel::orderBy('Id')->get();
        return $objTurma;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return TurmaModel::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TurmaModel  $turmaModel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $objTurma = TurmaModel::findOrFail($id);
        return $objTurma;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TurmaModel  $turmaModel
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TurmaModel  $turmaModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $objTurma = TurmaModel::findOrFail($id);
        return $objTurma->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TurmaModel  $turmaModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $objTurma = TurmaModel::findOrFail($id);
        return $objTurma->delete();
    }

    public function search(Request $request)
    {
        $query = DB::table('turma');
        if(!empty($request->nome)){
            $query->where('nome', 'like', "%" . $request->nome . "%");
        }

        if(!empty($request->sigla)){
            $query->where('sigla', 'like', "%" . $request->sigla . "%");
        }
        $objTurma = $query->orderBy('id')->get();
        return $objTurma;
    }
}


