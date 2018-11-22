<?php
  
namespace App\Http\Controllers;

use Auth;
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

	public function autoComplete(Request $request){
		if (Auth::Check()) {
			$busca = $request->term;
			$data = Animal::PorBusca($busca);
			$result = array();
			foreach ($data as $key => $value){
				$result[] = ['id' => $value->id,
							 'nome' => $value->nome,
							 'identificacao' => $value->identificacao,
							 'value' => $value->identificacao,
							 'label' => '<b>'.$value->identificacao.'</b>'.($value->nome<>'' ? ' - '.$value->nome : '')];
			}
			return response()->json($result);
		}
		else {
			return redirect()->to(route('home'));
		}
	}
}