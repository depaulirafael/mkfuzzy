<?php

namespace App\Http\Controllers;

use App\Agua;
use Illuminate\Http\Request;

class AguaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $agua = Agua::findOrFail(1);
        return view('agua', compact('agua'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'ruim_a' => 'required|numeric',
            'ruim_b' => 'required|numeric',
            'ruim_c' => 'required|numeric|min:'.$request->ruim_a,
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

        $agua = Agua::findOrFail(1);
        $agua->update($dataForm);
        return redirect()->route('home')->with('success','As configurações de Água foram atualizadas.');
    }
}
