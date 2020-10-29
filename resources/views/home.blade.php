@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <br>
            <div class="card">
                <script>
                    const zeroFill = n => {
                        return ('0' + n).slice(-2);
                    }
                    const interval = setInterval(() => {
                        const now = new Date();
                        const dataHora = zeroFill(now.getUTCDate()) + '/' + zeroFill((now.getMonth() + 1)) + '/' + now.getFullYear() + ' ' + zeroFill(now.getHours()) + ':' + zeroFill(now.getMinutes()) + ':' + zeroFill(now.getSeconds());
                        document.getElementById('data-hora').innerHTML = dataHora;
                    }, 1000);
                </script>
                <div style="background-color: #222831; color: white" class="card-header">
                    <div>Seja bem-vindo {{ Auth::user()->name }}</div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="btn-group col-md-12" role="group" aria-label="Basic example">
                        <a href="estoque/" class="btn btn-secondary">Estoque</a>
                        <a href="produto/" class="btn btn-secondary">Produtos</a>
                        <a href="fornecedor/" class="btn btn-secondary">Fornecedores</a>
                        <a href="" class="btn btn-secondary">Gráficos</a>
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
                    <div>Sugestões, dúvidas ou parcerias?</div>
                </div>
                <div class="card-body">
                    <iframe width="100%" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3558.826783600146!2d-52.41896860588241!3d-26.877243892230812!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94e4c3b9615ad887%3A0xf16edbe6afb32dd5!2zSUZTQyBDw6JtcHVzIFhhbnhlcsOq!5e0!3m2!1spt-BR!2sbr!4v1603908253865!5m2!1spt-BR!2sbr" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection