<?php

namespace App\Http\Controllers;

use App\CursoModel;
use Illuminate\Http\Request;
use stdClass;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*if (!session()->has('cursos')) {

            $objCurso1 = new stdClass();
            $objCurso1->id = 1;
            $objCurso1->nome = "Técnico em Informática";
            $objCurso1->abreviatura = "INFO01";

            $objCurso2 = new stdClass();
            $objCurso2->id = 2;
            $objCurso2->nome = "Técnico em Alimentos";
            $objCurso2->abreviatura = "AliO01";

            $vetorCurso = [$objCurso1, $objCurso2];

            session(['cursos' => $vetorCurso]); // define valor para sessão
        }*/
        // session(['cursos' => []]);
        $objCursos = CursoModel::orderBy('id')->get();

        //$objCursos = session('cursos'); // resgata valor da sessão


        return view('curso.list')->with('cursos', $objCursos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('curso.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $objCurso = new CursoModel();
        $objCurso->nome = $request->nome;
        $objCurso->abreviatura = $request->abreviatura;

        $objCurso->save();

        return redirect()->action('CursoController@index')->with('sucess', 'Curso salvo!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CursoModel  $cursoModel
     * @return \Illuminate\Http\Response
     */
    public function show(CursoModel $cursoModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CursoModel  $cursoModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $objCurso = CursoModel::findOrfail($id);
        return view('curso.edit')->with('curso', $objCurso);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CursoModel  $cursoModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $objCurso = CursoModel::findOrfail($request->id);
        $objCurso->nome = $request->nome;
        $objCurso->abreviatura = $request->abreviatura;

        $objCurso->save();

        return redirect()->action('CursoController@index')
            ->with('success', 'Curso Salvo com sucesso.');
    }

    public function remove($id)
    {
        $objCurso = CursoModel::findOrfail($id);
        $objCurso->delete();
        return redirect()->action('CursoController@index')
            ->with('success', 'Curso removido com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CursoModel  $cursoModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(CursoModel $cursoModel)
    {
        //
    }
    public function search(Request $request)
    {

        if (!empty($request->nome)) {
            $objCurso = CursoModel::where('nome', 'like', '%' . $request->nome . '%')->get();
        } else if (!empty($request->abreviatura)) {
            $objCurso = CursoModel::where('abreviatura', 'like', '%' . $request->abreviatura . '%')->get();
        } else {
            $objCurso = CursoModel::orderBy('id')->get();
        }

        return view('curso.list')->with('cursos', $objCurso);
    }
}
