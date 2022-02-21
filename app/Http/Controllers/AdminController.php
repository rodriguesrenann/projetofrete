<?php

namespace App\Http\Controllers;

use App\Repository\FreteRepository;
use App\Services\GraphService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(FreteRepository $freteRepository)
    {
        $bairrosMaisVisitados = $freteRepository->getMostVisitedneighborhood();

        $grapService = new GraphService;
        $pagePie = $grapService->treatGraph($bairrosMaisVisitados);

        $pageLabels = json_encode(array_keys($pagePie));
        $pageValues = json_encode(array_values($pagePie));

        return view('admin.home', [
            'fretes' => $freteRepository->countAllFretes(),
            'bairro_mais_visitado' => $bairrosMaisVisitados[0]['bairro'] ?? 'Nada ainda',
            'pageLabels' => $pageLabels,
            'pageValues' => $pageValues
        ]);
    }
}
