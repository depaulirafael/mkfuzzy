<?php

namespace App\Http\Controllers;

use App\Resultado;
use Illuminate\Http\Request;

class ResultadoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $resultado = Resultado::findOrFail(1);
        return view('resultado', compact('resultado'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'ruim_a' => 'required|numeric',
            'ruim_b' => 'required|numeric|min:'.$request->ruim_a,
            'satisfatorio_a' => 'required|numeric',
            'satisfatorio_c' => 'required|numeric|min:'.$request->satisfatorio_a,
            'excelente_a' => 'required|numeric',
            'excelente_b' => 'required|numeric|min:'.$request->excelente_a,
        ]);

        $dataForm = $request->all();
        $dataForm['satisfatorio_b'] = (($dataForm['satisfatorio_a'] + $dataForm['satisfatorio_c']) / 2);

        $resultado = Resultado::findOrFail(1);
        $resultado->update($dataForm);
        return redirect()->route('home')->with('success','As configurações de Resultado foram atualizadas.');
    }
}
