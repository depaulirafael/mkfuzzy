<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('auth.register');
    }
    
    public function user()
    {
        return view('auth.user');
    } 
    
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $dataForm = $request->all();
        $dataForm['password'] = Hash::make($dataForm['password']);

        User::create($dataForm);
        return redirect()->route('home')->with('success','Usuário cadastrado.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.Auth::user()->id,
            'password' => 'required|string|min:6|confirmed',
        ]);

        $dataForm = $request->all();
        $dataForm['password'] = Hash::make($dataForm['password']);

        $user = User::findOrFail(Auth::user()->id);
        $user->update($dataForm);
        return redirect()->route('home')->with('success','Dados Cadastrais alterados.');
    }

}