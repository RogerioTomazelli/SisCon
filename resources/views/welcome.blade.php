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

                <div style="background-color: #e8e8e8;" class="card-body">
                    <h1 style="font-size: 50px;"><strong>SisCon</strong></h1>
                    <h6 style="font-size: large;"><strong>Sistema de controle de estoque</strong></h6>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <img style="margin-left: 15%;" height="150" src="https://www.flaticon.com/svg/static/icons/svg/2289/2289375.svg" alt="">
                        </div>
                        <div style="padding-top: 2.5%;" class="col-8">
                            <h1 style="font-size: 50px;">Estoque</h1>
                            <p style="font-size: large;">Organize seu estoque em uma <strong>tabela interativa</strong>, controlando tudo que entra e sai.</p>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div style="padding-top: 2%; padding-left:7%" class="col-8">
                            <h1 style="font-size: 50px;">Produtos</h1>
                            <p style="font-size: large;">Cadastre os produtos que irão para o seu estoque e <strong>organize-os</strong> em grupos.</p>
                        </div>
                        <div class="col-4">
                            <img style="margin-left: 30%; margin-top:6%" height="150" src="https://www.flaticon.com/svg/static/icons/svg/2979/2979590.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <img style="margin-top: 4%; margin-left: 15%;" height="170" src="https://www.flaticon.com/svg/static/icons/svg/602/602232.svg" alt="">
                        </div>
                        <div style="padding-top: 2.5%;" class="col-8">
                            <h1 style="font-size: 50px;">Fornecedores</h1>
                            <p style="font-size: large;">Cadastre seus fornecedores com todas as <strong>informações necessárias</strong>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection