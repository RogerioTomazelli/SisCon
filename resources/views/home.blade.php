@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <br>
            <div class="card">
                <div style="background-color: #222831; color: white" class="card-header">
                    <div>Seja bem-vindo {{ Auth::user()->name }}</div>
                </div>
                <div class="card-body" style="padding: 0;">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="btn-group col-md-12" style="padding: 0;" role="group">
                        <a style="border-top-left-radius: 0; border-top-right-radius: 0;" href="estoque/" class="btn btn-secondary">Estoque</a>
                        <a style="border-top-left-radius: 0; border-top-right-radius: 0;" href="produto/" class="btn btn-secondary">Produtos</a>
                        <a style="border-top-left-radius: 0; border-top-right-radius: 0;" href="fornecedor/" class="btn btn-secondary">Fornecedores</a>
                        <a style="border-top-left-radius: 0; border-top-right-radius: 0;" href="profile/" class="btn btn-secondary">Perfil</a>
                        <a style="border-top-left-radius: 0; border-top-right-radius: 0;" href="#rodape" class="btn btn-secondary">Contate-nos</a>
                    </div>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-body">
                    <h5>📋 <i class="fa fa-angle-double-right"></i> Mantenha as tabelas sempre atualizadas!</h5><br>
                    <h5>📦 <i class="fa fa-angle-double-right"></i> Procure padronizar a formatação dos dados!</h5><br>
                    <h5>📈 <i class="fa fa-angle-double-right"></i> Acompanhe os gráficos para avaliar o desempenho da sua empresa!</h5>
                </div>
            </div>
            <br>
            <div class="card">
                <div style="background-color: #222831; color: white" class="card-header">
                    <div>Importância do controle de estoque</div>
                </div>
                <div class="card-body">
                    <iframe width="50%" height="315" src="https://www.youtube.com/embed/_aQf-tKNrTs" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <iframe width="49%" height="315" src="https://www.youtube.com/embed/N4B-xcClYhE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <br>
            <div class="card">
                <div style="background-color: #222831; color: white" class="card-header">
                    <div>Onde nos encontrar</div>
                </div>
                <div class="card-body">
                    <iframe width="100%" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3558.826783600146!2d-52.41896860588241!3d-26.877243892230812!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94e4c3b9615ad887%3A0xf16edbe6afb32dd5!2zSUZTQyBDw6JtcHVzIFhhbnhlcsOq!5e0!3m2!1spt-BR!2sbr!4v1603908253865!5m2!1spt-BR!2sbr" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div><br>
            <div id="rodape" class="card-header" style="background-color: #222831; color: white; height: 3.5%; border-radius: 20;">
                <h4>Caso seja necessário, envie um email para <strong>siscon@siscon.com</strong></h4>
            </div>
        </div>
    </div>
</div>
@endsection