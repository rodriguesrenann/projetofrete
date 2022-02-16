@extends('layouts.layout')
@section('title', 'Adicionar frete')

@section('content')
@section('title_page')
    Adicionar frete
@endsection
@section('button')
    <a href="{{ route('home') }}"><button class="btn btn-dark">Voltar</button></a>
@endsection
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
    <form method="POST" action="{{ route('add.frete.action') }}">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="product">Produto</label>
                <input type="text" class="form-control @error('product') is-invalid @enderror" id="product"
                    name="produto" placeholder="Sofá, Mesa..." value="{{ old('produto') }}">
            </div>
            <div class="form-group col-md-12">
                <label for="address">Endereço de entrega</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                    name="endereco_entrega" placeholder="Rua Cem A" value="{{ old('endereco_entrega') }}">
            </div>
            <div class="form-group col-md-12">
                <label for="date">Dia do frete</label>
                <input type="text" class="form-control @error('date') is-invalid @enderror" id="date" name="dia_frete"
                    placeholder="15/07/2021" value="{{ old('dia_frete') }}">
            </div>
            <div class="form-group col-md-12">
                <label for="time">Horário do frete</label>
                <input type="text" class="form-control" id="time" name="horario_frete" placeholder="Após as 18"
                    value="{{ old('horario_frete') }}">
            </div>
            <div class="form-group col-md-12">
                <label for="status">Status do frete</label>
                <input type="text" class="form-control" id="status" name="status_frete" placeholder="Pago"
                    value="{{ old('status_frete') }}">
            </div>
            <div class="form-group col-md-12">
                <label for="value">Valor do frete</label>
                <input type="text" class="form-control @error('value') is-invalid @enderror" id="value" name="valor_frete"
                    placeholder="R$40" value="{{ old('valor_frete') }}">
            </div>
            <div class="form-group col-md-12">
                <label for="obs">Observação</label>
                <input type="text" class="form-control" id="obs" name="observacao" placeholder="Ligar antes"
                    value="{{ old('observacao') }}">
            </div>
            <div class="form-group col-md-12">
                <label for="out">Estoque saída</label>
                <input type="text" class="form-control @error('out') is-invalid @enderror" id="out" name="estoque_saida"
                    placeholder="Canoas" value="{{ old('estoque_saida') }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputState"></label>
                <select id="inputState" name="id_loja_vendedora" class="form-control">
                    <option selected>Loja Vendedora</option>
                    <option value="1">Canoas</option>
                    <option value="2">Sapucaia</option>
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="out">Nome e número do cliente</label>
                <input type="text" class="form-control @error('out') is-invalid @enderror" id="out" name="nome_numero"
                    placeholder="Laís/952134568" value="{{ old('nome_numero') }}">
            </div>
        </div>
        <div class="form-group mt-2">
            <div class="form-check">
                <input class="form-check-input" value="1" type="checkbox" name="levar_maquina" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    Levar máquina
                </label>
            </div>
        </div>
        <div class="container text-center">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>

    </form>
</div>
@endsection
@section('script')
<script src="https://unpkg.com/imask"></script>
<script>
    IMask(
        document.getElementById("date"), {
            mask: '00/00/0000'
        }
    );
</script>
@endsection
