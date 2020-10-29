@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastro de curso') }}</div>

                <div class="card-body">
                    @if($errors->any())
                    <div>
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <h3>Formulário Curso</h3>
                    <form action="{{action('CursoController@update')}}" method="post">
                        <div class="form-row">
                            @csrf
                            <input type="hidden" name="id" value="{{$curso->id}}">
                            <div class="col-6">
                                <label for="nome">Nome</label>
                                <input class="form-control" type="text" name="nome" value="{{$curso->nome}}">
                            </div>
                            <div class="col-6">
                                <label for="abreviatura">Abreviatura</label>
                                <input class="form-control" type="text" name="abreviatura" value="{{$curso->abreviatura}}">
                            </div>
                            <div class="col-12">
                                <button class="btn btn-success" type="submit">Salvar <i class="fa fa-save"></i></button>
                                <a class="btn btn-primary" href="{{url('curso')}}">Voltar <i class="fa fa-angle-double-left"></i></a>
                            </div>
                                <!-- <button class="btn btn-primary" type="submit">Salvar</button>
                                <a class="btn btn-primary" href="{{url('curso')}}">Voltar</a> -->
                                
                        </div>
                    </form>

                    <!-- <a href="{{url('curso')}}"><button class="btn btn-primary">Voltar</button></a> -->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection