@extends('layouts.layout')'
@section('title', 'Teste')

@section('content')

@section('title_page')
    Controle de fretes
@endsection

@section('button')
    <a href="{{ route('add.frete') }}">
        <button type="button" class="btn btn-primary mb-2">Adicionar frete</button>
    </a>
    <a href="{{ route('add.frete') }}">
        <button type="button" class="btn btn-danger mb-2">Assistencias</button>
    </a>
@endsection

<div class="table-responsive">
    <table class="table table-bordered">
        <div class="d-flex justify-content-end mb-2">
            <form method="GET">
                <select onChange="this.form.submit()" name="done" id="options">
                    <option value="" selected disabled hidden>Filtro</option>
                    <option value="hoje" {{ $done === 'hoje' ? "selected='selected'" : '' }}>Hoje</option>
                    <option value="0" {{ $done === '0' ? "selected='selected'" : '' }}>Não concluídos</option>
                    <option value="1" {{ $done === '1' ? "selected='selected'" : '' }}>Concluídos</option>
                </select>
            </form>
        </div>
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

                    <td id="td">{{ $frete->produto }}</td>
                    <td id="td">{{ $frete->endereco_entrega }}</td>
                    <td id="td">{{ $frete->loja->nome_loja }}</td>
                    <td id="td">{{ date('d/m/Y', strtotime($frete->dia_frete)) }}</td>
                    <td id="td">{{ $frete->horario_frete }}</td>
                    <td id="td">{{ $frete->status_frete }}</td>
                    <td id="td">{{ $frete->levar_maquina == 0 ? 'Não' : 'Sim' }}</td>
                    <td id="td">{{ $frete->valor_frete }}</td>
                    <td id="td">{{ $frete->observacao }}</td>
                    <td id="td">{{ $frete->estoque_saida }}</td>
                    <td>
                        <div class="btn-group-toggle" data-toggle="buttons">
                            <label class="btn">
                                <input type="checkbox" id="checkbox" data-id="{{ $frete->id }}"
                                    {{ $frete->done ? 'checked' : '' }} autocomplete="off">
                            </label>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
@section('script')
<script>
    window.onload = function() {
        document.querySelectorAll('#checkbox').forEach((item) => {
            if (item.checked) {
                item.closest('tr').classList.add('table-success')
            } else {
                item.closest('tr').classList.add('table-danger')
            }
        })
    };
    document.querySelectorAll('#checkbox').forEach((item) => {

        item.addEventListener('click', click);
    })

    function click(e) {
        let id = this.getAttribute('data-id')
        let tr = this.closest('tr');
        if (this.checked) {
            tr.classList.remove('table-danger')
            tr.classList.add('table-success')
        } else {
            tr.classList.remove('table-success')
            tr.classList.add('table-danger')
        }

        setDone(id);
    }

    function setDone(id) {
        axios({
            method: 'post',
            url: 'api/setDone',
            data: {
                id: id
            }
        }).then((response) => {
            console.log(response)
        })
    }
</script>

@endsection
