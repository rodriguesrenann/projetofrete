<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
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
        

        $fretes = $this->repository->getTodayFretes();

        if ($done !== 'hoje') {
            $fretes = $this->repository->getFretesWhere($request->input('done'));
        }

        return view('home.home', [
            'fretes' => $fretes,
            'done' => $request->input('done')
        ]);
    }
}
