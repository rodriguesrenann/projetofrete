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
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>    
@endif

<div class="container">
    <form method="POST" action="{{ route('add.frete.action') }}">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="product">Produto</label>
                <input type="text" class="form-control @error('product') is-invalid @enderror" id="product" name="product" placeholder="Sofá, Mesa..." value="{{old('product')}}">
            </div>
            <div class="form-group col-md-6">
                <label for="address">Endereço de entrega</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="Rua Cem A" value="{{old('address')}}">
            </div>
            <div class="form-group col-md-6">
                <label for="date">Dia do frete</label>
                <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" placeholder="15/07/2021" value="{{old('date')}}">
            </div>
            <div class="form-group col-md-6">
                <label for="time">Horário do frete</label>
                <input type="text" class="form-control" id="time" name="time" placeholder="Após as 18" value="{{old('time')}}">
            </div>
            <div class="form-group col-md-6">
                <label for="status">Status do frete</label>
                <input type="text" class="form-control" id="status" name="status" placeholder="Pago" value="{{old('status')}}">
            </div>
            <div class="form-group col-md-6">
                <label for="value">Valor do frete</label>
                <input type="text" class="form-control @error('value') is-invalid @enderror" id="value" name="value" placeholder="R$40" value="{{old('value')}}">
            </div>
            <div class="form-group col-md-6">
                <label for="obs">Observação</label>
                <input type="text" class="form-control" id="obs" name="obs" placeholder="Ligar antes" value="{{old('obs')}}">
            </div>
            <div class="form-group col-md-6">
                <label for="out">Estoque saída</label>
                <input type="text" class="form-control @error('out') is-invalid @enderror" id="out" name="out" placeholder="Canoas" value="{{old('out')}}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputState"></label>
                <select id="inputState" name="store" class="form-control">
                    <option selected>Loja Vendedora</option>
                    <option value="1">Canoas</option>
                    <option value="2">Sapucaia</option>
                </select>
            </div>
        </div>
        <div class="form-group mt-2">
            <div class="form-check">
                <input class="form-check-input" value="1" type="checkbox" name="pay_machine" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    Levar máquina
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
@endsection
