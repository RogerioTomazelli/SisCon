@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Listagem dos cursos') }}</div>

                <div class="card-body">

                    <a class="btn btn-primary" href="{{url('/home')}}">Voltar</a><br><br>

                    <form action="{{action('CursoController@search')}}" method="POST">

                        @csrf
                        <div class="form-row">
                            <div class="col-3">
                                <input type="text" class="form-control" placeholder="Pesquisar nome" name="nome" />
                            </div>
                            <div class="col-3">
                                <input type="text" class="form-control" placeholder="Pesquisar abreviatura" name="abreviatura" />
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary">Buscar <i class="fa fa-search"></i></button>

                                <a href="{{ url('/curso/create')}}" class="btn btn-primary">Cadastrar <i class="fa fa-user-plus"></i></a>
                            </div>
                        </div>
                    </form>

                    <br>
                    <h3>Listagem de cursos</h3><br>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Abreviatura</th>
                                <th scope="col">Ação 1</th>
                                <th scope="col">Ação 2</th>
                            </tr>
                            @foreach($cursos as $dados)
                            <tr>
                                <td scope="row">{{$dados->id}}</td>
                                <td>{{$dados->nome}}</td>
                                <td>{{$dados->abreviatura}}</td>
                                <td><a class="btn btn-warning" href="{{ action('CursoController@edit',$dados->id) }}">Editar <i class="fa fa-edit"></i></a></td>
                                <td><a class="btn btn-danger" href="{{action('CursoController@remove',$dados->id) }}" onclick="return confirm('Deseja realmente remover esse curso?');">Remover <i class="fa fa-trash"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection