@extends('layouts.layout')
@section('title', 'Adicionar frete')

@section('content')
@section('title_page')
    Adicionar frete
@endsection
@section('button')
    <a href="{{route('home')}}"><button class="btn btn-dark">Voltar</button></a>
@endsection
    <div class="container">
        <form method="POST" action="{{route('add.frete.action')}}">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="product">Produto</label>
                    <input type="text" class="form-control" id="product" name="product" placeholder="Sofá, Mesa...">
                </div>
                <div class="form-group col-md-6">
                    <label for="address">Endereço de entrega</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Rua Cem A">
                </div>
                <div class="form-group col-md-6">
                    <label for="date">Dia do frete</label>
                    <input type="date" class="form-control" id="date" name="date" placeholder="15/07/2021">
                </div>
                <div class="form-group col-md-6">
                    <label for="time">Horário do frete</label>
                    <input type="text" class="form-control" id="time" name="time" placeholder="Após as 18">
                </div>
                <div class="form-group col-md-6">
                    <label for="status">Status do frete</label>
                    <input type="text" class="form-control" id="status" name="status" placeholder="Pago">
                </div>
                <div class="form-group col-md-6">
                    <label for="value">Valor do frete</label>
                    <input type="text" class="form-control" id="value" name="value" placeholder="R$40">
                </div>
                <div class="form-group col-md-6">
                    <label for="obs">Observação</label>
                    <input type="text" class="form-control" id="obs" name="obs" placeholder="Ligar antes">
                </div>
                <div class="form-group col-md-6">
                    <label for="out">Estoque saída</label>
                    <input type="text" class="form-control" id="out" name="out" placeholder="Canoas">
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
