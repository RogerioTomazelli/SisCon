@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edição dos dados do produto') }}</div>

                <div class="card-body">

                    @csrf
                    @if($errors->any())
                    <div>
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <br>
                    <form action="{{action('ProdutoController@update')}}" method="post">
                        <div class="form">
                            @csrf
                            <input type="hidden" name="id" value="{{$produto->id}}" />
                            <div class="form-group row justify-content-center">
                                <div class="col-md-9">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-archive"></i></span>
                                        </div>
                                        <input required class="form-control" type="text" placeholder="Nome do produto" name="nome" value="{{$produto->nome}}" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-md-9">
                                    <div class="input-group mb-3">
                                        <input required class="form-control" type="text" placeholder="Categoria" name="categoria" value="{{$produto->categoria}}" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-md-9">
                                    <div class="input-group mb-3">
                                        <textarea required class="form-control" placeholder="Descrição" value="{{$produto->descricao}}" name="descricao" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-md-9">
                                    <button class="btn btn-success" type="submit">Salvar</button>
                                    <a class="btn btn-primary" href="{{url('produto')}}">Voltar</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection