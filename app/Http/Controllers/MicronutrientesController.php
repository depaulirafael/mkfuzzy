<?php

namespace App\Http\Controllers;

use App\Micronutrientes;
use Illuminate\Http\Request;

class MicronutrientesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $micronutrientes = Micronutrientes::findOrFail(1);
        return view('micronutrientes', compact('micronutrientes'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'ruim_a' => 'required|numeric|max:100',
            'ruim_b' => 'required|numeric|max:100|min:'.$request->ruim_a,
            'regular_a' => 'required|numeric|max:100',
            'regular_c' => 'required|numeric|max:100|min:'.$request->regular_a,
            'bom_a' => 'required|numeric|max:100',
            'bom_c' => 'required|numeric|max:100|min:'.$request->bom_a,
            'excelente_a' => 'required|numeric|max:100',
            'excelente_b' => 'required|numeric|max:100|min:'.$request->excelente_a,
        ]);

        $dataForm = $request->all();
        $dataForm['regular_b'] = (($dataForm['regular_a'] + $dataForm['regular_c']) / 2);
        $dataForm['bom_b'] = (($dataForm['bom_a'] + $dataForm['bom_c']) / 2);

        $micronutrientes = Micronutrientes::findOrFail(1);
        $micronutrientes->update($dataForm);
        return redirect()->route('home')->with('success','As configurações de Água foram atualizadas.');
    }
}
