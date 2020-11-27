@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <br>
            <div class="card">
                <div style="background-color: #222831; color: white" class="card-header"><a class="btn btn-light" href="{{url('/home')}}">Voltar a tela principal</a></div>
                <div class="card-body">
                    <h5>Itens em estoque</h5><br>
                    <form action="{{ action('EstoqueController@search')}}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="col-4">
                                <input type="text" class="form-control" placeholder="Pesquisar pelo produto" name="produto" />
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control" placeholder="Pesquisar pelo fornecedor" name="fornecedor" />
                            </div>
                            <div class="btn-group col-md-4" role="group" aria-label="Basic example">
                                <button type="submit" class="btn btn-primary">Buscar no estoque <i class="fa fa-search"></i></button>
                                <a href="{{ url('/estoque/create')}}" class="btn btn-primary">Cadastrar compra <i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    </form>

                    <br><br><br>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Produto</th>
                                <th scope="col">Fornecedor</th>
                                <th scope="col">Valor total (R$)</th>
                                <th scope="col">Data</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            @foreach($estoques as $dados)
                            <tr>
                                <td scope="row">{{$dados->id}}</td>
                                <td>{{$dados->produto->nome}}</td>
                                <td>{{$dados->fornecedor->nome}}</td>
                                <td>{{$dados->preco_total}}</td>
                                <td>{{$dados->data}}</td>
                                <td>{{$dados->quantidade}}</td>
                                <td><a class="btn btn-success" href="{{action('EstoqueController@edit',$dados->id)}}">Editar</a></td>
                                <td><a class="btn btn-danger" href="{{action('EstoqueController@destroy',$dados->id)}}" onclick="return confirm('Deseja realmente vender esse item do estoque?')">Vender</a></td>
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