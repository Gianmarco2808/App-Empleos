<?php

namespace App\Http\Controllers\Candidatos;

use App\Models\Candidato;
use App\Http\Controllers\Controller;
use App\Models\Vacante;
use Illuminate\Http\Request;

class CandidatoController extends Controller
{

    public function index(Vacante $vacante)
    {
        return view('candidatos.index', ['vacante' => $vacante]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Candidato $candidato)
    {
        //
    }

    public function edit(Candidato $candidato)
    {
        //
    }

    public function update(Request $request, Candidato $candidato)
    {
        //
    }

    public function destroy(Candidato $candidato)
    {
        //
    }
}
