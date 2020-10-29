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
                            <h1 style="font-size: 50px;">Tabelas interativas</h1>
                            <p style="font-size: large;">Organize as suas informações e tenha <strong>controle total</strong> de seu estoque.</p>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div style="padding-top: 2%; padding-left:7%" class="col-8">
                            <h1 style="font-size: 50px;">Gráficos de fácil interpretação</h1>
                            <p style="font-size: large;">Acompanhe em <strong>tempo real</strong> o resultado de suas transações.</p>
                        </div>
                        <div class="col-4">
                            <img style="margin-left: 30%; margin-top:6%" height="150" src="https://www.flaticon.com/svg/static/icons/svg/3500/3500865.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection