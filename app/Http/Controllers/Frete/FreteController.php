<?php

namespace App\Http\Controllers\Frete;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FreteController extends Controller
{
    public function index()
    {
        return view('frete.frete-form');
    }
}
