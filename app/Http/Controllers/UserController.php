<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$objPerfil = User::orderBy('name')->get();
        return view("profile.profile")->with("profile", $objPerfil);*/
        return view('profile.profile');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //return view('profile.edit', compact('profile'));
        return view('profile.edit');
    }
    /*public function visualizar(User $users)
    {
        return view('profile.edit', compact('profile'));
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validação do formulário
        $request->validate([
            'name' => 'required|max:150',
            'email' => 'required|max:150',
            'password' => 'required|max:150',
        ]);

        $objPerfil = User::findorfail($id);
        $objPerfil->name = $request->name;
        $objPerfil->email = $request->email;
        $objPerfil->password = bcrypt($request->password);
       

        $objPerfil->save();


        return redirect()->route('profile.index')->with('success', 'Perfil editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $material = User::find($id);

        $material->delete();

        return redirect()->route('welcome')->with('success', 'Perfil deletado com Sucesso');
    }
}