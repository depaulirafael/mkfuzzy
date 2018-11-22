<?php
  
namespace App;
  
use Illuminate\Database\Eloquent\Model;
   
class Regra extends Model
{
    protected $fillable = [
        'termo_agua',
        'termo_carboidratos',
        'termo_proteinas',
        'termo_micronutrientes',
        'termo_resultado',
        'tipo_conexao',
    ];
    protected $table = 'regras';
}