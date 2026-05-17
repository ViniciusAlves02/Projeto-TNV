<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Locacao; 

class LocacaoController extends Controller
{
    public function index()
    {
        return Locacao::with(['user', 'funcionario', 'filme'])->get();
    }
}