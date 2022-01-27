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

    public function index(Request $request)
    {
        $done = $request->input('done');
        
        if ($done === 'todos') {
            $fretes = $this->repository->getAllFretes();
            return view('home.home', compact('fretes', 'done'));
        }

        $fretes = $this->repository->getFretesWhere($done);
        return view('home.home', compact('fretes', 'done'));
    }
}
