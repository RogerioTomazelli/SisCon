@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastro de aluno') }}</div>

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

                    <h3>Formulário</h3>
                    <form action="{{action('AlunoController@store')}}" method="post">
                        <div class="form-row">
                            @csrf
                            <div class="col-4">
                                <label for="nome">Nome</label>
                                <input class="form-control" type="text" name="nome" />
                            </div>
                            <div class="col-4">
                                <label for="curso">Curso</label>
                                <input class="form-control" type="text" name="curso" /><br>
                            </div>
                            <div class="col-4">
                                <label for="turma">Turma</label>
                                <input class="form-control" type="text" name="turma" /><br>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-success" type="submit">Salvar <i class="fa fa-save"></i></button>
                                <a class="btn btn-primary" href="{{url('aluno')}}">Voltar <i class="fa fa-angle-double-left"></i></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection