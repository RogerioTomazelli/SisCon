@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <br>
            <div class="card">
                <div style="background-color: #222831; color: white" class="card-header"><a class="btn btn-light" href="{{url('/home')}}">Voltar a tela principal</a></div>
                <div class="card-body">
                    <h5>Lista de fornecedores cadastrados</h5><br>
                    <form action="{{ action('FornecedorController@search')}}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="col-4">
                                <input type="text" class="form-control" placeholder="Pesquisar pelo nome" name="nome" />
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control" placeholder="Pesquisar pelo CNPJ (Ex.: 0.000.000/0000-00)" name="cnpj" />
                            </div>
                            <div class="btn-group col-md-4" role="group" aria-label="Basic example">
                                <button type="submit" class="btn btn-primary">Buscar <i class="fa fa-search"></i></button>
                                <a href="{{ url('/fornecedor/create')}}" class="btn btn-primary">Cadastrar <i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    </form>

                    <br><br><br>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nome</th>
                                <th scope="col">CNPJ</th>
                                <th scope="col">Email</th>
                                <th scope="col">Telefone</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            @foreach($fornecedores as $dados)
                            <tr>
                                <td scope="row">{{$dados->id}}</td>
                                <td>{{$dados->nome}}</td>
                                <td>{{$dados->cnpj}}</td>
                                <td>{{$dados->telefone}}</td>
                                <td>{{$dados->email}}</td>
                                <td><a class="btn btn-success" href="{{action('FornecedorController@edit',$dados->id)}}">Editar</a></td>
                                <td><a class="btn btn-danger" href="{{action('FornecedorController@remove',$dados->id)}}" onclick="return confirm('Deseja realmente remover esse fornecedor?')">Remover</a></td>
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