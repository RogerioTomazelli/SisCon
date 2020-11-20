@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Olá!</strong> Agradecemos pela confiança e estar usufruindo de nosso sitema!
            </div>
            <div class="card">
                <div style="background-color: #222831; color: white" class="card-header"><a class="btn btn-light" href="{{url('/home')}}">Voltar a tela principal</a></div>
                <div class="card-body">
                    <!--style="align-self: center;"-->
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
                    <div class="row">
                    <div class="col" style="padding-left: 40%;">
                            <img height="120" src="https://www.flaticon.com/svg/static/icons/svg/860/860784.svg" alt="">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col" style="padding-left: 35%;">
                            <h5>
                                <strong>Nome: </strong>{{ Auth::user()->name }}
                            </h5>
                            <h5>
                                <strong>Email: </strong>{{ Auth::user()->email }}
                            </h5>
                            <br>
                            <!-- &nbsp;&nbsp;
                            <a class="btn btn-primary" href="{{action('UserController@edit',Auth::user()->id)}}">Editar</a>
                            <a class="btn btn-danger" href="{{action('UserController@edit',Auth::user()->id)}}">Deletar perfil</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection