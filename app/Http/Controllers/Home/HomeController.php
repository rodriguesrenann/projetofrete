<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Frete;
use App\Repository\FreteRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $repository;

    public function __construct(FreteRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $fretes = $this->repository->getAllFretes();

        return view('home.home', compact('fretes'));  
    }
}
