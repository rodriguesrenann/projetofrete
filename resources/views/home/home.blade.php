@extends('layouts.layout')'
@section('title', 'Teste')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Controle de fretes</h1>
            <p class="lead">Página para controle de fretes da loja Rei dos Móveis.
            </p>
        </div>
    </div>
    <table class="table table-dark">
        <thead>
            <tr>

                <th scope="col">Produto</th>
                <th scope="col">Endereço</th>
                <th scope="col">Loja vendedora</th>
                <th scope="col">Dia do frete</th>
                <th scope="col">Horário do frete</th>
                <th scope="col">Status do frete</th>
                <th scope="col">Levar máquina</th>
                <th scope="col">Valor a cobrar</th>
                <th scope="col">Obs</th>
                <th scope="col">Estoque saída</th>
                <th scope="col">Concluído</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fretes as $frete)
                <tr>

                    <td>{{ $frete->produto }}</td>
                    <td id="address">{{ $frete->endereco_entrega }}</td>
                    <td>{{ $frete->loja->nome_loja }}</td>
                    <td class="date">{{ date('d/m/Y', strtotime($frete->dia_frete)) }}</td>
                    <td>{{ $frete->horario_frete }}</td>
                    <td>{{ $frete->status_frete }}</td>
                    <td>{{ $frete->levar_maquina == 0 ? 'Não' : 'Sim' }}</td>
                    <td>{{ $frete->valor_frete }}</td>
                    <td>{{ $frete->obs }}</td>
                    <td>{{ $frete->estoque_saida }}</td>
                    <td>
                        <div class="btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary active">
                                <input type="checkbox" {{$frete->done ? 'checked' : ''}} autocomplete="off"> Concluído
                            </label>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@section('script')
    <script>
        let address = document.querySelector('#address')
        console.log(address);
    </script>

@endsection
