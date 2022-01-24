<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Frete;
use Illuminate\Http\Request;

class FreteController extends Controller
{
    public function setDone(Request $request)
    {
        $frete = Frete::where('id', $request->id)->first();
        $frete->done = ($frete->done == 1 ? 0 : 1);
        $frete->save();
    }
}
