<?php
  
namespace App;
  
use Illuminate\Database\Eloquent\Model;
   
class Regra extends Model
{
    protected $fillable = [
        'termo_agua',
        'not_agua',
        'termo_carboidratos',
        'not_carboidratos',
        'termo_proteinas',
        'not_proteinas',
        'termo_micronutrientes',
        'not_micronutrientes',
        'termo_resultado',
        'not_resultado',
        'tipo_conexao',
    ];
    protected $table = 'regras';
}