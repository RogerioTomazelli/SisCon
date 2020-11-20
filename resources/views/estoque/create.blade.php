@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div style="background-color: #222831; color: white" class="card-header">{{ __('Registrar a compra do produto') }}</div>

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
                    <form action="{{action('EstoqueController@store')}}" method="post">
                        <div class="form">
                            @csrf
                            <div class="form-group row justify-content-center">
                                <div class="col-md-9">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-archive"></i></span>
                                        </div>
                                        <select class="form-control" name="produto_id">
                                            @foreach($produtos as $item)
                                            <option value="{{$item->id}}">{{$item->nome}}</option>
                                            @endforeach
                                        </select>
                                        <select class="form-control" name="fornecedor_id">
                                            @foreach($fornecedores as $item)
                                            <option value="{{$item->id}}">{{$item->nome}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-md-9">
                                    <div class="input-group mb-3">
                                        <input required class="form-control" type="date" name="data" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-md-9">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-cubes"></i></span>
                                        </div>
                                        <input required class="form-control" type="number" placeholder="Quantidade" name="quantidade" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-md-9">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">R$</span>
                                        </div>
                                        <input required class="form-control" type="text" placeholder="Preço unitário" name="preco_unit" />
                                        <input required class="form-control" type="text" placeholder="Preço total" name="preco_total" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-md-9">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-balance-scale"></i></span>
                                        </div>
                                        <input required class="form-control" type="text" placeholder="Peso unitário" name="peso_unit" />
                                        <select class="form-control" name="unidade" id="exampleFormControlSelect1">
                                            <option value="kg">Quilograma (Kg)</option>
                                            <option value="g">Grama (g)</option>
                                            <option value="mg">Miligrama (Mg)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-md-9">
                                    <button class="btn btn-success" type="submit">Salvar</button>
                                    <a class="btn btn-primary" href="{{url('estoque')}}">Voltar</a>
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