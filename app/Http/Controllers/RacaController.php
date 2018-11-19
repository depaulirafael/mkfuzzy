<?php
  
namespace App\Http\Controllers;
  
use App\Raca;
use Illuminate\Http\Request;
  
class RacaController extends Controller
{
    public function index()
    {
        $racas = Raca::latest()->paginate(5);
          return view('racas.index',compact('racas'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    public function create()
    {
        return view('racas.create');
    }
  
    public function store(Request $request)
    {
        $request->validate(['descricao' => 'required']);
        Raca::create($request->all());
        return redirect()->route('racas.index')->with('success','Raça inserida.');
    }
   
    public function show($id)
    {
        $raca = Raca::findOrFail($id);
        return view('racas.show',compact('raca'));
    }
   
    public function edit($id)
    {
        $raca = Raca::findOrFail($id);
        return view('racas.edit',compact('raca'));
    }
  
    public function update(Request $request, $id)
    {
        $request->validate(['descricao' => 'required']);
        $raca = Raca::findOrFail($id);
        $raca->update($request->all());
        return redirect()->route('racas.index')->with('success','Raça atualizada.');
    }
  
    public function destroy($id)
    {
        $raca = Raca::findOrFail($id);
        $raca->delete();
        return redirect()->route('racas.index')->with('success','Raça deletada.');
    }
}