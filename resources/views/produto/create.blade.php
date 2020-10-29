@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div style="background-color: #222831; color: white"  class="card-header">{{ __('Cadastro de novo produto') }}</div>

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
                    <form action="{{action('ProdutoController@store')}}" method="post">
                        <div class="form">
                            @csrf
                            <div class="form-group row justify-content-center">
                                <div class="col-md-9">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-archive"></i></span>
                                        </div>
                                        <input required class="form-control" type="text" placeholder="Nome do produto" name="nome" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-md-9">
                                    <div class="input-group mb-3">
                                        <input required class="form-control" type="text" placeholder="Categoria" name="categoria" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-md-9">
                                    <div class="input-group mb-3">
                                        <textarea class="form-control" placeholder="Descrição (opcional)" name="descricao" id="exampleFormControlTextarea1" rows="3"></textarea>
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