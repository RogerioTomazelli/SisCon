@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Listagem dos alunos') }}</div>

                <div class="card-body">

                    <a class="btn btn-primary" href="{{url('/home')}}">Voltar</a><br><br>

                    <form action="{{ action('AlunoController@search')}}" method="POST">

                        @csrf
                        <div class="form-row">
                            <div class="col-3">
                                <input type="text" class="form-control" placeholder="Pesquisar nome" name="nome" />
                            </div>
                            <div class="col-3">
                                <input type="text" class="form-control" placeholder="Pesquisar curso" name="curso" />
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary">Buscar <i class="fa fa-search"></i></button>
                                <a href="{{ url('/aluno/create')}}" class="btn btn-primary">Cadastrar <i class="fa fa-user-plus"></i></a>
                            </div>

                    </form>

                    <br><br><br>
                    <h3>Listagem de alunos</h3><br><br><br>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Curso</th>
                                <th scope="col">Turma</th>
                                <th scope="col">Ação 1</th>
                                <th scope="col">Ação 2</th>
                            </tr>
                            @foreach($alunos as $dados)
                            <tr>
                                <td scope="row">{{$dados->id}}</td>
                                <td>{{$dados->nome}}</td>
                                <td>{{$dados->curso}}</td>
                                <td>{{$dados->turma}}</td>
                                <td><a class="btn btn-warning" href="{{action('AlunoController@edit',$dados->id)}}">Editar <i class="fa fa-edit"></i></a></td>
                                <td><a class="btn btn-danger" href="{{action('AlunoController@remove',$dados->id)}}" onclick="return confirm('Deseja realmente remover esse aluno?')">Remover <i class="fa fa-trash"></i></a></td>
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