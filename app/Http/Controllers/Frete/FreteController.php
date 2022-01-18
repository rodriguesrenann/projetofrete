<?php

namespace App\Http\Controllers\Frete;

use App\Http\Controllers\Controller;
use App\Http\Requests\FreteRequest;
use App\Repository\FreteRepository;
use Illuminate\Http\Request;

class FreteController extends Controller
{
    private $repository;

    public function __construct(FreteRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return view('frete.frete-form');
    }

    public function create(FreteRequest $request)
    {
        $this->repository->createNewFrete($request);

        return redirect()->route('home');
    }
}
