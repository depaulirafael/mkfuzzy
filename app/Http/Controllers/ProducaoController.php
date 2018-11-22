<?php
  
namespace App\Http\Controllers;
  
use App\Producao;
use App\Agua;
use App\Carboidratos;
use App\Proteinas;
use App\Resultado;
use Illuminate\Http\Request;
  
class ProducaoController extends Controller
{
    public function index()
    {
        $producoes = Producao::Index();
          return view('producoes.index',compact('producoes'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    public function create()
    {
        $agua = Agua::findOrFail(1);
        $carboidratos = Carboidratos::findOrFail(1);
        $proteinas = Proteinas::findOrFail(1);
        return view('producoes.create', compact('agua', 'carboidratos', 'proteinas'));
    }
  
    public function store(Request $request)
    {
        $request->validate([
                'id_animal' => 'required',
                'data' => 'required|date',
                'agua' => 'required|numeric|min:0',
                'carboidratos' => 'required|numeric|min:0',
                'proteinas' => 'required|numeric|min:0',
                'micronutrientes' => 'required|numeric|min:0|max:100',
        ]);

        $dataForm = $request->all();
        $resultado = Producao::EstimativaFuzzy($dataForm['agua'], 
                                               $dataForm['carboidratos'], 
                                               $dataForm['proteinas'],
                                               $dataForm['micronutrientes']);
        $dataForm['resultado'] = $resultado;
        $dataForm['obs'] = '';
        
        $producao = Producao::create($dataForm);
        return redirect()->route('producoes.show', $producao->id);
    }
   
    public function show($id)
    {
        $producao = Producao::PorID($id);
        if ($producao->isEmpty()) {
            return redirect()->route('producoes.index');
        } else {
            $producao = $producao[0];
            $resultado = Resultado::findOrFail(1);
            if ($resultado->excelente_b > 0) {
                $producao->percentual = (($producao->resultado * 100) / $resultado->excelente_b);
            }
            return view('producoes.show',compact('producao'));            
        }
    }
   
    public function edit($id)
    {
        $producao = Producao::PorID($id);
        if ($producao->isEmpty()) {
            return redirect()->route('producoes.index');
        } else {
            $producao = $producao[0];
            $resultado = Resultado::findOrFail(1);
            if ($resultado->excelente_b > 0) {
                $producao->percentual = (($producao->resultado * 100) / $resultado->excelente_b);
            }
            return view('producoes.edit',compact('producao'));            
        }
    }
  
    public function update(Request $request, $id)
    {
        $request->validate([
            'producao_real' => 'required|numeric|min:0',
        ]);
        $producao = Producao::findOrFail($id);
        $producao->producao_real = $request['producao_real'];
        $producao->save();
        return redirect()->route('producoes.index')->with('success','Produção Real atualizada.');
    }
  
    public function destroy($id)
    {
        $producao = Producao::findOrFail($id);
        $producao->delete();
        return redirect()->route('producoes.index')->with('success','Estimativa de Produção deletada.');
    }
}