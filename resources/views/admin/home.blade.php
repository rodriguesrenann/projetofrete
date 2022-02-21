@extends('adminlte::page')

@section('title', 'Painel')

@section('plugins.Chartjs', true)

@section('content_header')
    <div class="row">
        <div class="col-md-6">
            <h1>Dashboard</h1>
        </div>
        <div class="col-md-6">
            <form method="GET">
                <select onChange="this.form.submit()" name="interval" class="float-md-right">
                    <option value="30">Ultimos 30 dias</option>
                    <option value="60">Ultimos 60 dias</option>
                    <option value="90">Ultimos 90 dias</option>
                </select>
            </form>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $fretes }}</h3>
                    <p>Total de fretes</p>
                </div>

            </div>
        </div>
        <div class="col-md-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $bairro_mais_visitado }}</h3>
                    <p>Bairro mais visitado</p>
                </div>

            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Gráfico de bairros</h3>
                </div>
                <div class="card-body">
                    <canvas id="pagePie"></canvas>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.onload = function() {
            let ctx = document.getElementById('pagePie').getContext('2d');
            window.pagePie = new Chart(ctx, {
                type: 'pie',
                data: {
                    datasets: [{
                        data: {{ $pageValues }},
                        backgroundColor: '#0000FF'
                    }],
                    labels: {!! $pageLabels !!}
                },
                options: {
                    responsive: true,
                    legend: {
                        display: false
                    }
                }
            })
        }
    </script>
@endsection
