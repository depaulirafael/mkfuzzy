<?php

namespace App\Http\Controllers;

use App\Carboidratos;
use Illuminate\Http\Request;

class CarboidratosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $carboidratos = Carboidratos::findOrFail(1);
        return view('carboidratos', compact('carboidratos'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'ruim_a' => 'required|numeric',
            'ruim_b' => 'required|numeric|min:'.$request->ruim_a,
            'regular_a' => 'required|numeric',
            'regular_c' => 'required|numeric|min:'.$request->regular_a,
            'bom_a' => 'required|numeric',
            'bom_c' => 'required|numeric|min:'.$request->bom_a,
            'excelente_a' => 'required|numeric',
            'excelente_b' => 'required|numeric|min:'.$request->excelente_a,
        ]);

        $dataForm = $request->all();
        $dataForm['regular_b'] = (($dataForm['regular_a'] + $dataForm['regular_c']) / 2);
        $dataForm['bom_b'] = (($dataForm['bom_a'] + $dataForm['bom_c']) / 2);

        $carboidratos = Carboidratos::findOrFail(1);
        $carboidratos->update($dataForm);
        return redirect()->route('home')->with('success','As configurações de Carboidratos foram atualizadas.');
    }
}
