<?php
  
namespace App\Http\Controllers;
  
use App\Animal;
use App\Raca;
use Illuminate\Http\Request;
  
class AnimalController extends Controller
{
    public function index()
    {
        $animais = Animal::latest()->paginate(5);
          return view('animais.index',compact('animais'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    public function create()
    {
        $racas = Raca::all();
        return view('animais.create',compact('racas'));
    }
  
    public function store(Request $request)
    {
        $request->validate([
            'identificacao' => 'required|unique:animais',
            'id_raca' => 'required',
        ]);
        Animal::create($request->all());
        return redirect()->route('animais.index')->with('success','Animal inserido.');
    }
   
    public function show($id)
    {
        $racas = Raca::all();
        $animal = Animal::findOrFail($id);
        return view('animais.show',compact('animal', 'racas'));
    }
   
    public function edit($id)
    {
        $racas = Raca::all();
        $animal = Animal::findOrFail($id);
        return view('animais.edit',compact('animal', 'racas'));
    }
  
    public function update(Request $request, $id)
    {
        $request->validate([
            'identificacao' => 'required|unique:animais,identificacao,'.$id,
            'id_raca' => 'required',
        ]);
        $animal = Animal::findOrFail($id);
        $animal->update($request->all());
        return redirect()->route('animais.index')->with('success','Animal atualizado.');
    }
  
    public function destroy($id)
    {
        $animal = Animal::findOrFail($id);
        $animal->delete();
        return redirect()->route('animais.index')->with('success','Animal deletado.');
    }
}