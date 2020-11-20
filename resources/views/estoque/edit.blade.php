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
                    <form action="{{action('EstoqueController@update')}}" method="post">
                        <div class="form">
                            @csrf
                            <input type="hidden" name="id" value="{{$estoque->id}}" />
                            <div class="form-group row justify-content-center">
                                <div class="col-md-9">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-archive"></i></span>
                                        </div>
                                        <select name="produto_id" class="form-control">
                                            @foreach ($produtos as $item)
                                            <option value="{{ $item->id }}" @if ($item->id == old('produto_id', $estoque->produto_id))
                                                selected="selected"
                                                @endif
                                                >{{$item->nome}}</option>
                                            @endforeach
                                        </select>
                                        <select name="fornecedor_id" class="form-control">
                                            @foreach ($fornecedores as $item)
                                            <option value="{{ $item->id }}" @if ($item->id == old('fornecedor_id', $estoque->fornecedor_id))
                                                selected="selected"
                                                @endif
                                                >{{$item->nome}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-md-9">
                                    <div class="input-group mb-3">
                                        <input required class="form-control" type="date" name="data" value="{{$estoque->data}}" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-md-9">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-cubes"></i></span>
                                        </div>
                                        <input required class="form-control" type="number" placeholder="Quantidade" value="{{$estoque->quantidade}}" name="quantidade" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-md-9">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">R$</span>
                                        </div>
                                        <input required class="form-control" type="text" placeholder="Preço unitário" value="{{$estoque->preco_unit}}" name="preco_unit" />
                                        <input required class="form-control" type="text" placeholder="Preço total" value="{{$estoque->preco_total}}" name="preco_total" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-md-9">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-balance-scale"></i></span>
                                        </div>
                                        <input required class="form-control" type="text" placeholder="Peso unitário" value="{{$estoque->peso_unit}}" name="peso_unit" />
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