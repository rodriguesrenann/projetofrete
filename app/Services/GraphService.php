<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;

class GraphService
{
    public function treatGraph(Collection $bairrosMaisVisitados)
    {
        $pagePie = [];
        foreach ($bairrosMaisVisitados as $bairro) {
            $pagePie[$bairro['bairro']] = $bairro['count'];
        }

        return $pagePie;
    }
}
