<?php

namespace App\Repository;

use App\Models\Frete;
use DateTime;
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
        return $this->repository->orderBy('dia_frete', 'DESC')->get();
    }

    public function getFretesWhere($status): Collection
    {
        $dia = new DateTime();
        $dia = $dia->format('Y-m-d');
        return $this->repository->where('done', $status)->orderBy('dia_frete', 'DESC')->get();
    }

    public function getTodayFretes(): Collection
    {
        $dia = new DateTime();
        $dia = $dia->format('Y-m-d');
        return $this->repository->where('dia_frete', $dia)->where('done', 0)->get();
    }

    public function createNewFrete(FormRequest $request)
    {
        return $this->repository->create($request->all());
    }
}
