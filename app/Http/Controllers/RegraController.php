<?php
  
namespace App\Http\Controllers;
  
use App\Regra;
use Illuminate\Http\Request;
  
class RegraController extends Controller
{
    public function index()
    {
        $regras = Regra::latest()->paginate(5);
          return view('regras.index',compact('regras'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    public function create()
    {
        return view('regras.create');
    }
  
    public function store(Request $request)
    {
        $request->validate([
            'termo_agua' => 'required',
            'termo_carboidratos' => 'required',
            'termo_proteinas' => 'required',
            'termo_micronutrientes' => 'required',
            'termo_resultado' => 'required',
            'tipo_conexao' => 'required',        
        ]);

        $dataForm = $request->all();
        $dataForm['not_agua'] = (!isset($dataForm['not_agua']))? 0 : 1;
        $dataForm['not_carboidratos'] = (!isset($dataForm['not_carboidratos']))? 0 : 1;
        $dataForm['not_proteinas'] = (!isset($dataForm['not_proteinas']))? 0 : 1;
        $dataForm['not_micronutrientes'] = (!isset($dataForm['not_micronutrientes']))? 0 : 1;
        $dataForm['not_resultado'] = (!isset($dataForm['not_resultado']))? 0 : 1;

        Regra::create($dataForm);
        return redirect()->route('regras.index')->with('success','Regra inserida.');
    }
   
    public function show($id)
    {
        $regra = Regra::findOrFail($id);
        return view('regras.show',compact('regra'));
    }
   
    public function edit($id)
    {
        $regra = Regra::findOrFail($id);
        return view('regras.edit',compact('regra'));
    }
  
    public function update(Request $request, $id)
    {
        $request->validate([
            'termo_agua' => 'required',
            'termo_carboidratos' => 'required',
            'termo_proteinas' => 'required',
            'termo_micronutrientes' => 'required',
            'termo_resultado' => 'required',
            'tipo_conexao' => 'required',        
        ]);
      
        $dataForm = $request->all();
        $dataForm['not_agua'] = (!isset($dataForm['not_agua']))? 0 : 1;
        $dataForm['not_carboidratos'] = (!isset($dataForm['not_carboidratos']))? 0 : 1;
        $dataForm['not_proteinas'] = (!isset($dataForm['not_proteinas']))? 0 : 1;
        $dataForm['not_micronutrientes'] = (!isset($dataForm['not_micronutrientes']))? 0 : 1;
        $dataForm['not_resultado'] = (!isset($dataForm['not_resultado']))? 0 : 1;

        $regra = Regra::findOrFail($id);
        $regra->update($dataForm);
        return redirect()->route('regras.index')->with('success','Regra atualizada.');
    }
  
    public function destroy($id)
    {
        $regra = Regra::findOrFail($id);
        $regra->delete();
        return redirect()->route('regras.index')->with('success','Regra deletada.');
    }
}