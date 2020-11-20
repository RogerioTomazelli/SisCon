@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Atenção!</strong> Para confirmar a alteração, reescreva a senha ou altere-a!
            </div>

            <div class="card">

                <div style="background-color: #222831; color: white" class="card-header"><a class="btn btn-light botao-voltar" href="{{action('UserController@index',Auth::user()->id)}}">Voltar</a>&nbsp;&nbsp;&nbsp;&nbsp;{{ __('Editar Perfil') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @if($errors->any())
                    <div class="alert alert-danger">
                        <strong>Opa!</strong>Há algum problema com as informações!<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{action('UserController@update',Auth::user()->id)}}" method="POST">
                        @csrf
                        @method('put')
                        <input type="hidden" name="id" value="{{ Auth::user()->id }}" />
                        <label>Nome</label> </br>
                        <input class="form-control" type="text" name="name" value="{{ Auth::user()->name }}" /> </br>
                        <label>E-mail</label> </br>
                        <input class="form-control" type="text" name="email" value="{{ Auth::user()->email }}" /> </br>
                        <label>Senha</label> </br>
                        <input class="form-control" required type="text" name="password" value="" placeholder="******" /> </br>
                        <button type="submit" class="btn btn-primary botao-login">Atualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection