<?php

namespace App\Repository;

use App\Models\Frete;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Http\FormRequest;

class FreteRepository 
{
    private $repository;

    public function __construct(Frete $repository)
    {
        $this->repository = $repository;
    }

    public function getAllFretes(): Collection
    {
        return $this->repository->all();
    }

    public function createNewFrete(FormRequest $request)
    {
        return $this->repository->create([
            'produto' => $request->product,
            'endereco_entrega' => $request->address,
            'id_loja_vendedora' => $request->store,
            'dia_frete' => $request->date,
            'horario_frete' => $request->time,
            'status_frete' => $request->status,
            'levar_maquina' => $request->pay_machine,
            'valor_frete' => $request->value,
            'observacao' => $request->obs,
            'estoque_saida' => $request->out,
        ]);
    }
}