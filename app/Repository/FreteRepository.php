<?php

namespace App\Repository;

use App\Models\Frete;
use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Http\FormRequest;

class FreteRepository
{
    private Frete $repository;

    public function __construct(Frete $repository)
    {
        $this->repository = $repository;
    }

    public function getAllFretes(): Collection
    {
        return $this->repository->orderBy('dia_frete', 'DESC')->get();
    }

    public function getFretesWhere($status): Collection
    {
        $dia = new DateTime();
        $dia = $dia->format('Y-m-d');
        return $this->repository->where('concluido', $status)->orderBy('dia_frete', 'DESC')->get();
    }

    public function getTodayFretes(): Collection
    {
        $dia = new DateTime();
        $dia = $dia->format('Y-m-d');
        return $this->repository->where('dia_frete', $dia)->where('concluido', 0)->get();
    }

    public function createNewFrete(FormRequest $request)
    {
        return $this->repository->create([
            'produto' => $request['produto'],
            'endereco_entrega' => $request['endereco_entrega'],
            'id_loja_vendedora' => $request['id_loja_vendedora'],
            'nome_numero' => $request['nome_numero'],
            'dia_frete' => Carbon::createFromFormat('d/m/Y', $request['dia_frete'])->format('Y-m-d'),
            'horario_frete' => $request['horario_frete'],
            'status_frete' => $request['status_frete'],
            'levar_maquina' => $request['levar_maquina'],
            'observacao' => $request['observacao'],
            'estoque_saida' => $request['estoque_saida'] 
        ]);
    }
}
