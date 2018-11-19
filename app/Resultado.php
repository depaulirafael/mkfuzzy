<?php
  
namespace App;
  
use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    protected $fillable = [
        'ruim_a',
        'ruim_b',
        'satisfatorio_a',
        'satisfatorio_b',
        'satisfatorio_c',
        'excelente_a',
        'excelente_b',
    ];
    protected $table = 'resultado';
}