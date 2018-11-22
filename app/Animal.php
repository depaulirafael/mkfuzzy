<?php
  
namespace App;
  
use Illuminate\Database\Eloquent\Model;
   
class Animal extends Model
{
    protected $fillable = [
        'identificacao', 'nome', 'id_raca'
    ];
    protected $table = 'animais';

    public static function PorBusca($busca){
		return self::where('nome', 'like', $busca.'%')
					->orwhere('identificacao', 'like', $busca.'%')
					->get();
	}
}