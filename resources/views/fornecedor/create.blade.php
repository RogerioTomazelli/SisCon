@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div style="background-color: #222831; color: white"  class="card-header">{{ __('Cadastro de novo fornecedor') }}</div>

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
                    <form action="{{action('FornecedorController@store')}}" method="post">
                        <div class="form">
                            @csrf
                            <div class="form-group row justify-content-center">
                                <div class="col-md-9">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-building"></i></span>
                                        </div>
                                        <input required class="form-control" type="text" placeholder="Nome da empresa" name="nome" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-md-5">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                                        </div>
                                        <input required class="form-control" type="text" placeholder="Email" name="email" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone"></i></span>
                                        </div>
                                        <input required class="form-control" type="text" placeholder="Telefone" name="telefone" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-md-9">
                                    <div class="input-group mb-3">
                                        <input required class="form-control" type="text" placeholder="CNPJ" name="cnpj" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-md-9">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Endereço</span>
                                        </div>
                                        <input required class="form-control" type="text" placeholder="Estado" name="estado" />
                                        <input required class="form-control" type="text" placeholder="Cidade" name="cidade" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-md-9">
                                    <div class="input-group mb-3">
                                        <input required class="form-control" type="text" placeholder="Bairro" name="bairro" />
                                        <input required class="form-control" type="text" placeholder="Rua" name="rua" />
                                        <input required class="form-control" type="text" placeholder="Número" name="numero" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-md-9">
                                    <button class="btn btn-success" type="submit">Salvar</button>
                                    <a class="btn btn-primary" href="{{url('fornecedor')}}">Voltar</a>
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