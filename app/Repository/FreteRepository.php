<?php

namespace App\Repository;

use App\Models\Frete;
use Illuminate\Database\Eloquent\Collection;

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
}